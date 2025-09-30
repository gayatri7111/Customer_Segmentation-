<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['user_type'] !== 'customer') {
    header("Location: login.html");
    exit();
}
// Show customer-specific content
?>
