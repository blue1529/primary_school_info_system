<?php
require("../db.php");
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

// GET CLASS
$class_id = ($user['role'] == "teacher") ? $user['class'] : $_GET['class'] ?? 1;

// GET DATE (default today)
$date = isset($_GET['date']) ? $_GET['date'] : date("Y-m-d");

// GET STUDENTS
$students = mysqli_query($conn, "SELECT * FROM student WHERE class='$class_id'");

// SAVE ATTENDANCE
if (isset($_POST['save'])) {

    foreach ($_POST['student_id'] as $id) {

        $status = isset($_POST['present'][$id]) ? "Present" : "Absent";

        mysqli_query($conn, "
        INSERT INTO Attendance (student_id, class_id, term_id, date, status)
        VALUES ('$id','$class_id','1','$date','$status')
        ON DUPLICATE KEY UPDATE status='$status'
        ");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Attendance</title>
<link rel="stylesheet" href="grades.css">
</head>

<body>

<div class="navbar">
     <div class="nav-center">
      <h2>Attendance</h2>
    </div>
     <div class="nav-right">
     
<button onclick="window.location.href='class_teacher.php'"  style="box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.507);
     margin-right: 55px;">Go back</button>
    </div>

</div>

<form method="GET" style="margin-top :10%;width:20%;margin-left :50px;">
    <label>Select Date:</label>
    <input type="date" name="date" value="<?php echo $date; ?>"> <br>
    <button type="submit">Refresh</button>
</form>
<br>

<form method="POST" style="margin : 50px; background-color: #f2f2f2;border-radius: 10px;">

<table>
<tr>
<th>Name</th>
<th>Present / absent</th>
<th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($students)) {

    $sid = $row['student_id'];

    // FETCH EXISTING ATTENDANCE
    $check = mysqli_query($conn, "
        SELECT status FROM Attendance 
        WHERE student_id='$sid' AND date='$date'
    ");

    $att = mysqli_fetch_assoc($check);
    $isPresent = ($att && $att['status'] == "Present");
?>
<tr>
<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>

<td>
<input type="checkbox" name="present[<?php echo $sid; ?>]" <?php if($isPresent) echo "checked"; ?>>
<input type="hidden" name="student_id[]" value="<?php echo $sid; ?>">
</td>

<td>
<?php echo $isPresent ? "Present" : "Absent"; ?>
</td>

</tr>
<?php } ?>

</table>

<button name="save" style="margin:10px;box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.507);">Save Attendance</button> <br>

</form>



</body>
</html>