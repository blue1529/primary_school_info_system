<?php
require("../db.php");


//add ku teachers too
session_start();


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

if ($user['role'] == "teacher") {
    $class = $user['class'];
    $sql = "SELECT * FROM student WHERE class='$class'";
} else {
    $sql = "SELECT * FROM student";
}
//do ku teachers too
$result = mysqli_query($conn, $sql);



// $sql = "SELECT * FROM student";
// $result = mysqli_query($conn, $sql);

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
        <h2>
<?php
if ($user['role'] == "teacher") {
    echo "Class " . $user['class'];
} else {
    echo "Headmaster Dashboard";
}
?>
</h2>
    </div>

    <div class="nav-right">
        <button onclick="addStudent()">Add Student</button>
        <button onclick="grades()">Enter Grades</button>
        <a href="logout.php">
<button style="background: #f3295b;color:white;">Logout</button>
</a>
    </div>
</div>

<div class="main">

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
            echo "<td>".$row['special_needs']."</td>";
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

</script>

</body>
</html>