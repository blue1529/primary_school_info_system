<?php 

// 1. Connect to the database (change these values to match your setup)
$servername = "localhost"; // usually "localhost"
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "primary_school_info_system"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>