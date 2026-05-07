<?php 

// 1. Connect to the database (change these values to match your setup)
$servername = "localhost";
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "primary_school_info_system"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>