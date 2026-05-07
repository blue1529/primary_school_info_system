<?php
include("../include/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name      = trim($_POST['fname']);
    $middle_name     = trim($_POST['mname']);
    $last_name       = trim($_POST['sname']);
    $enrollment_date = trim($_POST['enroll']);
    $dob             = trim($_POST['dob']);
    $class           = trim($_POST['class']);
    $gender          = trim($_POST['gender']);
    $special_needs   = trim($_POST['specialneeds']);
    $paddress        = trim($_POST['postaladdress']);
    $relationship    = trim($_POST['relationship']);
    $parent_fname    = trim($_POST['pfname']);
    $parent_lname    = trim($_POST['psname']);
    $parent_email    = trim($_POST['email']);
    $parent_phone    = trim($_POST['phone']);

    if (!filter_var($parent_email, FILTER_VALIDATE_EMAIL)) {
        header("Location: studentreg.php?error=invalid_email");
        exit;
    }

    // enrollment date: cannot be in the future 
    if (strtotime($enrollment_date) > strtotime(date('Y-m-d'))) {
        header("Location: studentreg.php?error=invalid_enroll_date");
        exit;
    }

   // dob != future
    if (strtotime($dob) > strtotime(date('Y-m-d'))) {
        header("Location: studentreg.php?error=invalid_dob");
        exit;
    }

   // dob >= 3
    if (strtotime($dob) > strtotime('-3 years')) {
        header("Location: studentreg.php?error=too_young");
        exit;
    }

    $sql = "INSERT INTO student (first_name, middle_name, last_name, gender,  date_of_birth, 
      parent_fname, parent_lname, parent_phone,  parent_email, class, enrollment_date,  special_needs, address) 
            VALUES ('$first_name', '$middle_name', '$last_name', '$gender','$dob', '$parent_fname', '$parent_lname','$parent_phone', '$parent_email', '$class', '$enrollment_date','$special_needs', '$paddress')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: studentreg.php?success=1");
    } else {
        header("Location: studentreg.php?error=1");
    }
    exit;
}
?>