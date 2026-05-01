<?php
$conn = mysqli_connect("localhost", "root", "", "school");

$id = $_GET['id'];

/* GET STUDENT + GRADES */
$sql = "
SELECT g.*, s.first_name, s.middle_name, s.last_name, s.parent_email
FROM grades g
JOIN student s ON g.student_id = s.student_id
WHERE g.grade_id = $id
";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

/* POSITION (RANK) */
$rank_sql = mysqli_query($conn, "SELECT COUNT(*) AS total FROM grades");
$total_students = mysqli_fetch_assoc($rank_sql)['total'];

$position_sql = mysqli_query($conn, "
SELECT COUNT(*) AS pos FROM grades 
WHERE average >= {$data['average']}
");
$position = mysqli_fetch_assoc($position_sql)['pos'];

/* COMMENT */
$comment = ($data['status'] == "PASS")
    ? "Excellent performance. Keep it up!"
    : "Needs improvement. Work harder next term.";
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Report</title>

<link rel="stylesheet" href="reports.css">

</head>

<body>

<div class="report">

<h2>STUDENT REPORT</h2>

<p><b>Name:</b>
<?php echo $data['first_name']." ".$data['middle_name']." ".$data['last_name']; ?>
</p>

<p><b>Position:</b> <?php echo $position." out of ".$total_students; ?></p>

<table>
<tr>
    <th>Subject</th>
    <th>Marks</th>
</tr>

<tr><td>Mathematics</td><td><?php echo $data['mathematics']; ?></td></tr>
<tr><td>English</td><td><?php echo $data['english']; ?></td></tr>
<tr><td>Biology</td><td><?php echo $data['biology']; ?></td></tr>
<tr><td>Chemistry</td><td><?php echo $data['chemistry']; ?></td></tr>
<tr><td>Physics</td><td><?php echo $data['physics']; ?></td></tr>
<tr><td>Geography</td><td><?php echo $data['geography']; ?></td></tr>
<tr><td>History</td><td><?php echo $data['history']; ?></td></tr>
<tr><td>Computer</td><td><?php echo $data['computer']; ?></td></tr>

</table>

<p><b>Total:</b> <?php echo $data['total']; ?></p>
<p><b>Average:</b> <?php echo $data['average']; ?></p>
<p><b>Grade:</b> <?php echo $data['grade']; ?></p>
<p><b>Status:</b> <?php echo $data['status']; ?></p>

<h3>Comment</h3>
<p><?php echo $comment; ?></p>

<button class="print-btn" onclick="window.print()">Download PDF</button>

</div>


</body>
</html>