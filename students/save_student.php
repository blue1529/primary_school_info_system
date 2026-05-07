<?php
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $first_name = $_POST['fname'];
    $middle_name = $_POST['mname'];
    $last_name = $_POST['sname'];
    $enrollment_date = $_POST['enroll'];
    $dob = $_POST['dob'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];
    $special_needs = $_POST['specialneeds'];
    $paddress = $_POST['postaladdress'];
    
    $relationship = $_POST['relationship'];
    $parent_fname = $_POST['pfname'];
    $parent_lname = $_POST['psname'];
    $parent_email = $_POST['email'];
    $parent_phone = $_POST['phone'];

   if (!filter_var($parent_email, FILTER_VALIDATE_EMAIL)) {
    header("Location: studentreg.php?error=invalid_email");
    exit;
}
 if (strtotime($dob) > strtotime(date('Y-m-d'))) {
        header("Location: studentreg.php?error=invalid_dob");
        exit;
    }

    $dob_timestamp = strtotime($dob);
    $min_age_timestamp = strtotime('-3 years');
    if ($dob_timestamp > $min_age_timestamp) {
        header("Location: studentreg.php?error=too_young");
        exit;
    }

    $sql = "INSERT INTO student (first_name, middle_name, last_name, gender,
     date_of_birth, parent_fname, parent_lname, parent_phone, parent_email, class, enrollment_date, special_needs, address)
            VALUES ('$first_name', '$middle_name', '$last_name', '$gender', '$dob','$parent_fname',  '$parent_lname', '$parent_phone', '$parent_email', '$class','$enrollment_date', '$special_needs', '$paddress')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: studentreg.php?success=1");
        exit;
    } else {
        header("Location: studentreg.php?error=1");
        exit;
    }
    
}
?>