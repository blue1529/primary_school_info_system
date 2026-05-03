<?php
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // student details
    $first_name = $_POST['fname'];
    $middle_name = $_POST['mname'];
    $last_name = $_POST['sname'];
    $enrollment_date = $_POST['enroll'];
    $dob = $_POST['dob'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];
    $residence = $_POST['residence'];
    $special_needs = $_POST['specialneeds'];
    $address = $_POST['postaladdress'];
    
    // parent details
    $parent_fname = $_POST['pfname'];
    $parent_lname = $_POST['psname'];
    $relationship = $_POST['relationship'];
    $parent_email = $_POST['email'];
    $parent_phone = $_POST['phone'];
    
    // insert into database
    $sql = "INSERT INTO Student (first_name, middle_name, last_name, enrollment_date,
     date_of_birth, class, gender, place_of_residence, special_needs, address, 
     parent_fname, parent_lname, parent_relationship, parent_email, parent_phone) 
            VALUES ('$first_name', '$middle_name', '$last_name', '$enrollment_date', '$dob', '$class', '$gender', '$residence', '$special_needs', '$address', '$parent_fname', '$parent_lname', '$relationship', '$parent_email', '$parent_phone')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: studentreg.php?success=1");
    } else {
        header("Location: studentreg.php?error=1");
    }
    exit;
}
?>