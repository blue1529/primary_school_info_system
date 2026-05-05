<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
require_once __DIR__ . '/../include/db_connect.php';

if (!$conn || !($conn instanceof mysqli)) {
    die("Database connection failed: " . mysqli_connect_error());
}
// Check if form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get values from the form and remove extra spaces
    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name = trim($_POST['last_name']);
    $phone = trim($_POST['phone_number']);
    $email = trim($_POST['email']);
    $class_name = trim($_POST['class_name']);
    $subjects_taught = trim($_POST['subjects_taught']);
    $gender = trim($_POST['gender']);
    $date_of_start = date('Y-m-d');  // start upon registration
    $place_of_residence = trim($_POST['place_of_residence']);

    // Name Validation
    if (empty($first_name) || empty($last_name) || empty($email)) {
        die("First name, last name, and email are required.");
    }

    // Make the data safe for SQL (prevents hacking)
    $first_name = mysqli_real_escape_string($conn, $first_name);
    $middle_name = mysqli_real_escape_string($conn, $middle_name);
    $last_name = mysqli_real_escape_string($conn, $last_name);
    $phone = mysqli_real_escape_string($conn, $phone);
    $email = mysqli_real_escape_string($conn, $email);
    $class_name = mysqli_real_escape_string($conn, $class_name);
    $subjects_taught = mysqli_real_escape_string($conn, $subjects_taught);
    $gender = mysqli_real_escape_string($conn, $gender);
    $date_of_start = mysqli_real_escape_string($conn, $date_of_start);
    $place_of_residence = mysqli_real_escape_string($conn, $place_of_residence);

    // Build the SQL INSERT query (now the values are safe)
    $sql = "INSERT INTO Teacher   (
                first_name, 
                middle_name, 
                last_name, 
                phone, 
                email, 
                class_name, 
                subjects_taught, 
                gender, 
                date_of_start, 
                place_of_residence
            ) VALUES (
                '$first_name', 
                '$middle_name', 
                '$last_name', 
                '$phone', 
                '$email', 
                '$class_name', 
                '$subjects_taught', 
                '$gender', 
                '$date_of_start', 
                '$place_of_residence'
            )";

    // Run the query
    $result = mysqli_query($conn, $sql);

    // Check if it worked
    if ($result) {
        echo "New teacher registered successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>