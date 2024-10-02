<?php
$servername = "localhost";   // Server name (localhost for XAMPP)
$username = "root";          // Default XAMPP MySQL username
$password = "";              // Leave blank for no password (default for XAMPP)
$dbname = "demure";          // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
