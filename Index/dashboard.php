<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: Login.html");
    exit();
}
$email = $_SESSION['email'];
$userType = $_SESSION['user_type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Customer Segmentation Dashboard</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <style>
    html, body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f7fa;
      color: #222;
    }

    .page-content {
      flex: 1;
    }

    .dashboard-hero {
      padding: 60px 20px;
      text-align: center;
    }

    .dashboard-hero h1 {
      font-size: 2.5rem;
      font-weight: bold;
    }

    .dashboard-hero p {
      font-size: 1.1rem;
      margin-top: 15px;
      color: #333;
    }

    .dashboard-buttons {
      margin-top: 35px;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
    }

    .dashboard-buttons a, .dashboard-buttons form button {
      background-color: #0066cc;
      color: #fff;
      padding: 14px 25px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: background-color 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .dashboard-buttons a:hover, .dashboard-buttons form button:hover {
      background-color: #004c99;
    }

    .navbar {
      background-color: #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      padding: 10px 20px;
    }

    .navbar .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .main-menu ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      gap: 20px;
    }

    .main-menu ul li {
      display: inline;
    }

    .main-menu a {
      text-decoration: none;
      color: #333;
      font-weight: 600;
    }

    .main-menu a:hover {
      color: #0066cc;
    }

    .footer {
      background-color: #111;
      color: #eee;
      padding: 50px 20px;
      font-size: 0.9rem;
    }

    .footer-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      max-width: 1200px;
      margin: auto;
    }

    .footer-grid div {
      margin: 20px;
    }

    .footer-grid h4 {
      margin-bottom: 10px;
    }

    .footer-grid ul {
      list-style: none;
      padding: 0;
    }

    .footer-grid ul li a {
      color: #ccc;
      text-decoration: none;
    }

    .footer-grid ul li a:hover {
      color: #fff;
    }

    .footer i {
      font-size: 1.3rem;
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <div class="page-content">
    <!-- Navigation Bar -->
    <nav class="navbar">
      <div class="container">
        <div class="logo">
          <a href="index.php">
            <img src="Images/segmentation.jpg" alt="logo" height="60px" />
          </a>
        </div>
        <div class="main-menu">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Welcome Section -->
    <section class="dashboard-hero">
      <h1>Welcome, <?php echo htmlspecialchars($email); ?>!</h1>
      <p>You're now in the customer segmentation dashboard. Here, you can upload customer data and view insightful visualizations.</p>
      <br>
      <div class="dashboard-buttons">
        <!-- Streamlit app link -->
        <form action="http://localhost:8501" method="get" target="_blank">
    <button type="submit">Upload CSV File</button>
</form>

        <!-- Results page -->
       
      </div>
    </section>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div>
          <a href="index.php">
            <img src="Images/segmentation.jpg" alt="logo" height="60px" />
          </a><br><br>
          <i class="fab fa-linkedin"></i>
          <i class="fab fa-twitter"></i>
        </div>
        <div>
          <h4>Company</h4>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Our Process</a></li>
            <li><a href="#">Join Our Team</a></li>
          </ul>
        </div>
        <div>
          <h4>Resources</h4>
          <ul>
            <li><a href="#">News</a></li>
            <li><a href="#">Research</a></li>
            <li><a href="#">Recent Projects</a></li>
          </ul>
        </div>
        <div>
          <h4>Contact</h4>
          <ul>
            <li><a href="#">hello@segmentapp.com</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
