<?php
require_once __DIR__ . "/../include/db_connect.php";


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


<?php
// PASS / FAIL
$pass = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT COUNT(*) as total FROM grades g 
JOIN student s ON g.student_id = s.student_id
WHERE g.status='PASS' " . ($user['role']=="teacher" ? "AND s.class=".$user['class'] : "")
))['total'];

$fail = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT COUNT(*) as total FROM grades g 
JOIN student s ON g.student_id = s.student_id
WHERE g.status='FAIL' " . ($user['role']=="teacher" ? "AND s.class=".$user['class'] : "")
))['total'];

// GENDER
$boys = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT COUNT(*) as total FROM student 
WHERE gender='Male' " . ($user['role']=="teacher" ? "AND class=".$user['class'] : "")
))['total'];

$girls = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT COUNT(*) as total FROM student 
WHERE gender='Female' " . ($user['role']=="teacher" ? "AND class=".$user['class'] : "")
))['total'];

// MARK DISTRIBUTION
$low = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM grades WHERE total < 200"))['t'];
$mid = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM grades WHERE total BETWEEN 200 AND 400"))['t'];
$high = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM grades WHERE total > 400"))['t'];

// ATTENDANCE
// GET DATE (default today)
$selected_date = isset($_GET['date']) ? $_GET['date'] : date("Y-m-d");

if ($user['role'] == "teacher") {
    $class = $user['class'];

    $present = mysqli_fetch_assoc(mysqli_query($conn, "
        SELECT COUNT(*) as t 
        FROM Attendance a
        JOIN student s ON a.student_id = s.student_id
        WHERE a.status='Present' 
        AND a.date='$selected_date'
        AND s.class='$class'
    "))['t'] ?? 0;

    $absent = mysqli_fetch_assoc(mysqli_query($conn, "
        SELECT COUNT(*) as t 
        FROM Attendance a
        JOIN student s ON a.student_id = s.student_id
        WHERE a.status='Absent' 
        AND a.date='$selected_date'
        AND s.class='$class'
    "))['t'] ?? 0;

} else {

    $present = mysqli_fetch_assoc(mysqli_query($conn, "
        SELECT COUNT(*) as t 
        FROM Attendance 
        WHERE status='Present' AND date='$selected_date'
    "))['t'] ?? 0;

    $absent = mysqli_fetch_assoc(mysqli_query($conn, "
        SELECT COUNT(*) as t 
        FROM Attendance 
        WHERE status='Absent' AND date='$selected_date'
    "))['t'] ?? 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Teacher Class Page</title>

<link rel="stylesheet" href="class_teacher.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

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
        <button onclick="attendance()">Attendance</button>
        <a href="logout.php">
<button style="background: #f3295b;color:white;">Logout</button>
</a>
    </div>
</div>

<div class="main">

        <div class="dashboard">

        <div class="card" >
            <h3>Gender distribution</h3>
            <canvas id="chart1" style="
    width: 250px !important;
    height: 250px !important;
    margin: auto;"
></canvas>
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



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

// CHART 1: PIE (Boys vs Girls)
new Chart(document.getElementById("chart1"), {
    type: 'pie',
    data: {
        labels: ['Boys', 'Girls'],
        datasets: [{
            data: [<?php echo $boys ?>, <?php echo $girls ?>]
        }]
    }
});

// CHART 2: HISTOGRAM (Marks)
new Chart(document.getElementById("chart2"), {
    type: 'bar',
    data: {
        labels: ['Low (0–199)', 'Medium (200–400)', 'High (401+)'],
        datasets: [{
            label: 'Marks Distribution',
            data: [<?php echo $low ?>, <?php echo $mid ?>, <?php echo $high ?>]
        }]
    }
});

// CHART 3: LINE (Attendance)
new Chart(document.getElementById("chart3"), {
    type: 'bar',
    data: {
        labels: ['Present', 'Absent'],
        datasets: [{
            label: 'Attendance (<?php echo $selected_date; ?>)',
            data: [<?php echo $present ?>, <?php echo $absent ?>],
            tension: 0.3
        }]
    }
});

function addStudent() {
    window.location.href = "../students/studentreg.html";
}


function grades() {
    window.location.href = "grades.php";
}

function attendance() {
    window.location.href = "attendance.php";
}

</script>

</body>
</html>