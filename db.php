<?php
$conn = mysqli_connect("localhost", "root", "", "primary_school_info_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>