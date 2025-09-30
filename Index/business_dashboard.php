<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['user_type'] !== 'business') {
    header("Location: login.html");
    exit();
}
// Show customer-specific content
?>
