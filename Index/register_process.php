<?php
session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "Gayatri@2006";
$database = "segmentation_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$plain_password = $_POST['password'];
$user_type = $_POST['user_type']; // 'customer' or 'business'

// Hash the password
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

// Determine table
$table = ($user_type === 'business') ? 'businesses' : 'customers';

// Insert user into the corresponding table
$sql = "INSERT INTO $table (email, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $hashed_password);

if ($stmt->execute()) {
    echo "Registration successful. <a href='login.html'>Click here to login</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
