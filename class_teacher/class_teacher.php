<?php
require("../db.php");

$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Teacher Class Page</title>

<link rel="stylesheet" href="class_teacher.css">

</head>

<body>

<div class="navbar">

    <div class="nav-center">
        <h2>Class 1</h2>
    </div>

    <div class="nav-right">
        <button onclick="addStudent()">Add Student</button>
        <button onclick="grades()">Enter Grades</button>
        <button onclick="logout()">LOG-OUT</button>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <!-- DASHBOARD -->
    <div class="dashboard">

        <div class="card">
            <h3>Pass vs Fail</h3>
            <canvas id="chart1"></canvas>
        </div>

        <div class="card">
            <h3>Performance</h3>
            <canvas id="chart2"></canvas>
        </div>

        <div class="card">
            <h3>Attendance Rate</h3>
            <canvas id="chart3"></canvas>
        </div>

    </div>


            <h2>Students Table</h2>

<div class="table-container">
<table>

    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Parent First Name</th>
        <th>Parent Last Name</th>
        <th>Parent Phone</th>
        <th>Parent Email</th>
        <th>Class</th>
        <th>Enrollment Date</th>
        <th>Special Needs</th>
        <th>Address</th>
    </tr>

    <?php
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";

            echo "<td>".$row['student_id']."</td>";
            echo "<td>".$row['first_name']."</td>";
            echo "<td>".$row['middle_name']."</td>";
            echo "<td>".$row['last_name']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['date_of_birth']."</td>";
            echo "<td>".$row['parent_fname']."</td>";
            echo "<td>".$row['parent_lname']."</td>";
            echo "<td>".$row['parent_phone']."</td>";
            echo "<td>".$row['parent_email']."</td>";
            echo "<td>".$row['class']."</td>";
            echo "<td>".$row['enrollment_date']."</td>";
            echo "<td>".$row['Special_needs']."</td>";
            echo "<td>".$row['address']."</td>";

            echo "</tr>";
        }

    } else {
        echo "<tr><td colspan='14'>No students found</td></tr>";
    }
    ?>

</table>
</div>

</div>

<script>

function addStudent() {
    window.location.href = "add_student.php";
}


function grades() {
    window.location.href = "grades.php";
}

function enterGrade(id) {
    window.location.href = "enter_grade.php?id=" + id;
}

</script>

</body>
</html>