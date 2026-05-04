<?php
// 1. Include database connection
require("../db.php");

// 2. Check if form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 3. Get values from the form and remove extra spaces
    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name = trim($_POST['last_name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $class = trim($_POST['class']);
    $subject_taught = trim($_POST['subject']);
    $gender = trim($_POST['gender']);
    $date_of_start = trim($_POST['date_of_start']);  // fixed spelling
    $place_of_residence = trim($_POST['place_of_residence']);

    // 4. Basic validation (stop if empty)
    if (empty($first_name) || empty($last_name) || empty($email)) {
        die("First name, last name, and email are required.");
    }

    // 5. Make the data safe for SQL (prevents hacking)
    $first_name = mysqli_real_escape_string($conn, $first_name);
    $middle_name = mysqli_real_escape_string($conn, $middle_name);
    $last_name = mysqli_real_escape_string($conn, $last_name);
    $phone = mysqli_real_escape_string($conn, $phone);
    $email = mysqli_real_escape_string($conn, $email);
    $class = mysqli_real_escape_string($conn, $class);
    $subject_taught = mysqli_real_escape_string($conn, $subject_taught);
    $gender = mysqli_real_escape_string($conn, $gender);
    $date_of_start = mysqli_real_escape_string($conn, $date_of_start);
    $place_of_residence = mysqli_real_escape_string($conn, $place_of_residence);

    // 6. Build the SQL INSERT query (now the values are safe)
    $sql = "INSERT INTO teachers (
                first_name, 
                middle_name, 
                last_name, 
                phone, 
                email, 
                class, 
                subject_taught, 
                gender, 
                date_of_start, 
                place_of_residence
            ) VALUES (
                '$first_name', 
                '$middle_name', 
                '$last_name', 
                '$phone', 
                '$email', 
                '$class', 
                '$subject_taught', 
                '$gender', 
                '$date_of_start', 
                '$place_of_residence'
            )";

    // 7. Run the query
    $result = mysqli_query($conn, $sql);

    // 8. Check if it worked
    if ($result) {
        echo "New teacher registered successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // 9. Close the connection
    mysqli_close($conn);
}
?>