<?php
session_start();

// Connect to MySQL
$servername = "localhost";
$username = "root"; 
$password = "Gayatri@2006";   
$database = "segmentation_db"; 

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$email = $_POST['email'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];  // 'customer' or 'business'

// Choose the table based on user type
$table = ($user_type === 'business') ? 'businesses' : 'customers';

// Prepare SQL query
$sql = "SELECT * FROM $table WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    // Verify password
    if (password_verify($password, $user['password'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_type'] = $user_type;

        // Redirect to dashboard or homepage
        header("Location: dashboard.php"); // Redirect to the homepage or dashboard
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>
