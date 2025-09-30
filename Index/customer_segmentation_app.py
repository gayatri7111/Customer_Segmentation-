import streamlit as st
import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt
import plotly.express as px
from sklearn.preprocessing import StandardScaler
from sklearn.cluster import KMeans

# ------------------------ Customer View ------------------------
def customer_view(df):
    st.subheader("🔍 Customer View")

    st.write("### Full Customer Data")
    st.dataframe(df)  # ✅ Show all rows, not just head()

    selected_col = st.selectbox("Select column for graph", df.columns)

    # Add color picker for the user to choose color
    selected_color = st.color_picker("Pick a color for the graph", "#636EFA")

    if pd.api.types.is_numeric_dtype(df[selected_col]):
        fig = px.histogram(df, x=selected_col, title=f"Distribution of {selected_col}", color_discrete_sequence=[selected_color])
    else:
        fig = px.pie(df, names=selected_col, title=f"Pie chart of {selected_col}", color_discrete_sequence=[selected_color])

    st.plotly_chart(fig)

    st.write("### Histograms for Numeric Columns")
    numeric_df = df.select_dtypes(include=['float64', 'int64'])
    if not numeric_df.empty:
        for col in numeric_df.columns:
            st.write(f"#### Distribution of {col}")
            fig = px.histogram(df, x=col, title=f"{col} Histogram", nbins=30, color_discrete_sequence=[selected_color])
            st.plotly_chart(fig)


# ------------------------ Business View (Use all attributes, label if possible) ------------------------
def business_view(df):
    st.subheader("📊 Business View (Segmentation Analysis)")

    st.write("### Original Data Preview")
    st.dataframe(df)

    # Add color picker for the user to choose color in business view
    selected_color = st.color_picker("Pick a color for the graphs", "#636EFA")

    # Identify numeric and categorical columns
    numeric_df = df.select_dtypes(include=['float64', 'int64'])
    categorical_cols = df.select_dtypes(include=['object', 'category']).columns.tolist()

    if numeric_df.empty:
        st.error("No numeric columns found for clustering.")
        return

    label_col = None
    if categorical_cols:
        label_col = st.selectbox("Select label column for graphs (optional)", ["None"] + categorical_cols)
        if label_col == "None":
            label_col = None

    num_clusters = st.slider("Select number of clusters (K)", min_value=2, max_value=10, value=3)

    # Clustering
    scaler = StandardScaler()
    scaled_data = scaler.fit_transform(numeric_df)

    kmeans = KMeans(n_clusters=num_clusters, random_state=42)
    df['Cluster'] = kmeans.fit_predict(scaled_data)

    st.write("### Clustered Full Dataset")
    st.dataframe(df)

    # Cluster count with label if available
    st.write("### Cluster Distribution")
    if label_col:
        grouped = df.groupby(['Cluster', label_col]).size().reset_index(name='Count')
        fig = px.bar(
            grouped,
            x='Cluster',
            y='Count',
            color=label_col,
            barmode='group',
            title='Customer Count per Cluster by Label',
            color_discrete_sequence=[selected_color]
        )
    else:
        fig = px.histogram(df, x='Cluster', title='Customer Count per Cluster', color='Cluster', color_discrete_sequence=[selected_color])

    st.plotly_chart(fig)

    # 2D scatter plot from all attributes
    st.write("### 2D Scatter Plot (All numeric attributes)")
    if numeric_df.shape[1] >= 2:
        x_col = st.selectbox("Select X-axis", numeric_df.columns)
        y_col = st.selectbox("Select Y-axis", [col for col in numeric_df.columns if col != x_col])

        fig = px.scatter(
            df,
            x=x_col,
            y=y_col,
            color='Cluster',
            symbol=label_col if label_col else None,
            hover_data=df.columns,
            title=f"{x_col} vs {y_col} by Cluster",
            color_discrete_sequence=[selected_color]  # Apply selected color here
        )
        st.plotly_chart(fig)

    # Summary by cluster
    st.write("### Cluster-wise Summary")
    st.dataframe(df.groupby("Cluster").mean(numeric_only=True))

    if label_col:
        st.write("### Cluster vs Label Table")
        st.dataframe(df.groupby(['Cluster', label_col]).size().unstack(fill_value=0))

# ------------------------ Main App ------------------------
def main():
    st.set_page_config(page_title="Customer Segmentation Dashboard", layout="wide")
    st.title("📌 Customer Segmentation Mini Project")

    st.sidebar.title("Navigation")
    menu = st.sidebar.radio("Select View", ["Customer", "Business"])

    uploaded_file = st.sidebar.file_uploader("Upload CSV File", type=["csv"])

    if uploaded_file is not None:
        df = pd.read_csv(uploaded_file)

        if menu == "Customer":
            customer_view(df)
        elif menu == "Business":
            business_view(df)
    else:
        st.info("Please upload a CSV file to continue.")

if __name__ == "__main__":
    main()
