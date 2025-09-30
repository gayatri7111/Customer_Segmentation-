<?php
$hashedPassword = password_hash("user123", PASSWORD_DEFAULT);
echo "Hashed password: " . $hashedPassword;
?>
