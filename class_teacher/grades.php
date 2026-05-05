<?php
require("../db.php");


session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];



$message = "";

$edit_mode = false;
$edit_data = null;

// LOAD DATA FOR EDIT
if (isset($_GET['edit'])) {
    $edit_mode = true;
    $id = $_GET['edit'];

    $edit_query = mysqli_query($conn, "
        SELECT * FROM grades WHERE grade_id = $id
    ");

    $edit_data = mysqli_fetch_assoc($edit_query);
}

if (isset($_POST['update'])) {

    $grade_id = $_POST['grade_id'];

    $student_id = $_POST['student_id'];
    $term = $_POST['term'];

    $math = $_POST['mathematics'];
    $eng = $_POST['english'];
    $bio = $_POST['biology'];
    $chem = $_POST['chemistry'];
    $phy = $_POST['physics'];
    $geo = $_POST['geography'];
    $hist = $_POST['history'];
    $comp = $_POST['computer'];

    $total = $math + $eng + $bio + $chem + $phy + $geo + $hist + $comp;
    $average = $total / 8;

    if ($average >= 75) $grade = "A";
    elseif ($average >= 65) $grade = "B";
    elseif ($average >= 50) $grade = "C";
    elseif ($average >= 40) $grade = "D";
    else $grade = "F";

    $status = ($average >= 50) ? "PASS" : "FAIL";

    mysqli_query($conn, "
        UPDATE grades SET
        student_id='$student_id',
        term='$term',
        mathematics='$math',
        english='$eng',
        biology='$bio',
        chemistry='$chem',
        physics='$phy',
        geography='$geo',
        history='$hist',
        computer='$comp',
        total='$total',
        average='$average',
        grade='$grade',
        status='$status'
        WHERE grade_id='$grade_id'
    ");

    header("Location: grades.php");
    exit();
}


if (isset($_POST['save'])) {

    $student_id = $_POST['student_id'];
    $term = $_POST['term'];

    // Check duplicates
    $check = mysqli_query($conn, "SELECT * FROM grades WHERE student_id='$student_id' AND term='$term'");

    if (mysqli_num_rows($check) > 0) {
        $message = "This student already has grades for this term!";
    } else {

        $agri = $_POST['agriculture'];
        $bible = $_POST['bible_knowledge'];
        $math = $_POST['mathematics'];
        $eng = $_POST['english'];
        $chi = $_POST['chichewa'];
        $soc = $_POST['social'];
        $life = $_POST['lifeskills'];
        $arts = $_POST['expressive_arts'];

        $total = $agri + $bible + $math + $eng + $chi + $soc + $life + $arts;
        $average = $total / 8;

        if ($average >= 75) $grade = "A";
        elseif ($average >= 65) $grade = "B";
        elseif ($average >= 50) $grade = "C";
        elseif ($average >= 40) $grade = "D";
        else $grade = "F";

        $status = ($average >= 50) ? "PASS" : "FAIL";

        $sql = "INSERT INTO grades 
        (student_id, term, agriculture, bible_knowledge, mathematics, english, chichewa, social, lifeskills, expressive_arts, total, average, grade, status) 
        VALUES 
        ('$student_id','$term','$agri','$bible','$math','$eng','$chi','$soc','$life','$arts','$total','$average','$grade','$status')";

        if (mysqli_query($conn, $sql)) {
            $message = "Grades saved successfully!";
        } else {
            $message = "Error saving grades!";
        }
    }
}


$students = mysqli_query($conn, "
    SELECT student_id, first_name, last_name 
    FROM student
    ORDER BY first_name ASC, last_name ASC
");


if ($user['role'] == "teacher") {
    $class = $user['class'];

    $grades = mysqli_query($conn, "
        SELECT g.*, s.first_name, s.last_name 
        FROM grades g
        JOIN student s ON g.student_id = s.student_id       
        WHERE s.class='$class'
        ORDER BY g.total DESC
    ");
} else {
    $grades = mysqli_query($conn, "
        SELECT g.*, s.first_name, s.last_name 
        FROM grades g
        JOIN student s ON g.student_id = s.student_id
        ORDER BY g.total DESC
    ");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Grades</title>

<link rel="stylesheet" href="grades.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


</head>

<body>


<div class="navbar">

    <div class="nav-center">
      <h2>Enter Grades</h2>
    </div>

   <div class="nav-right">
    <button style="background: #27ae60 ; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.507);" onclick="returnteacher()">GO BACK</button>
</div>

</div>


<!-- <div>
    <button style="width: 12%; background: black" onclick="returnteacher()">GO BACK</button>
</div> -->

<div class="container">

<!-- <h2>Enter Grades</h2> -->

<?php if ($message != "") echo "<div class='message'>$message</div>"; ?>

<!-- FORM SECTION-->
<div class="form-box">

<form method="POST">

<?php if ($edit_mode) { ?>
    <input type="hidden" name="grade_id" value="<?php echo $edit_data['grade_id']; ?>">
<?php } ?>

<div class="grid">

   <select name="student_id" required>
    <option value="">Select Student</option>

    <?php

    if ($user['role'] == "teacher") {
    $class = $user['class'];
    $students = mysqli_query($conn, "
        SELECT student_id, first_name, last_name 
        FROM student
        WHERE class='$class'
        ORDER BY first_name ASC
    ");
} else {
    $students = mysqli_query($conn, "
        SELECT student_id, first_name, last_name 
        FROM student
        ORDER BY first_name ASC
    ");
}
    // $students = mysqli_query($conn, "SELECT student_id, first_name, last_name FROM student ORDER BY first_name ASC");

    while($row = mysqli_fetch_assoc($students)) {
        $selected = ($edit_mode && $edit_data['student_id'] == $row['student_id']) ? "selected" : "";
        echo "<option value='{$row['student_id']}' $selected>{$row['first_name']} {$row['last_name']}</option>";
    }
    ?>
</select>


    <select name="term" required>
        <option value="">Select Term</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
    </select>

     <label for="agriculture">Agriculture</label>
<input type="number" id="agriculture" name="agriculture" placeholder="Enter agriculture score" required
value="<?php echo $edit_mode ? $edit_data['agriculture'] : ''; ?>">

<label for="bible_knowledge">Bible knowledge</label>
<input type="number" id="bible_knowledge" name="bible_knowledge" placeholder="Enter bible_knowledge score" required
value="<?php echo $edit_mode ? $edit_data['bible_knowledge'] : ''; ?>">

<label for="mathematics">Mathematics</label>
<input type="number" id="mathematics" name="mathematics" placeholder="Enter mathematics score" required
value="<?php echo $edit_mode ? $edit_data['mathematics'] : ''; ?>">

<label for="english">English</label>
<input type="number" id="english" name="english" placeholder="Enter english score" required
value="<?php echo $edit_mode ? $edit_data['english'] : ''; ?>">

<label for="chichewa">Chichewa</label>
<input type="number" id="chichewa" name="chichewa" placeholder="Enter chichewa score" required
value="<?php echo $edit_mode ? $edit_data['physics'] : ''; ?>">

<label for="social">Social</label>
<input type="number" id="social" name="social" placeholder="Enter social score" required
value="<?php echo $edit_mode ? $edit_data['social'] : ''; ?>">

<label for="lifeskills">Life skills</label>
<input type="number" id="lifeskills" name="lifeskills" placeholder="Enter lifeskills score" required
value="<?php echo $edit_mode ? $edit_data['lifeskills'] : ''; ?>">

<label for="expressive_arts">Expressive arts</label>
<input type="number" id="expressive_arts" name="expressive_arts" placeholder="Enter expressive_arts score" required
value="<?php echo $edit_mode ? $edit_data['expressive_arts'] : ''; ?>">

</div>

<br>
<?php if ($edit_mode) { ?>
    <button type="submit" name="update">Update Grades</button>
<?php } else { ?>
    <button type="submit" name="save">Save Grades</button>
<?php } ?>

</form>

</div>

<div class="table-box">

<h3>Grades Records</h3>

<table>
<tr>
    <th>ID</th>
    <th>Student</th>
    <th>Term</th>
    <th>Agriculture</th>
    <th>B.knowledge</th>
    <th>Maths</th>
    <th>English</th>
    <th>Chichewa</th>
    <th>Social</th>
    <th>L.skills</th>
    <th>E.arts</th>
    <th>Total</th>
    <th>Average</th>
    <th>Grade</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($g = mysqli_fetch_assoc($grades)) { ?>
<tr>
    <td><?php echo $g['grade_id']; ?></td>
    <td><?php echo $g['first_name']." ".$g['last_name']; ?></td>
    <td><?php echo $g['term']; ?></td>
    <td><?php echo $g['agriculture']; ?></td>
    <td><?php echo $g['bible_knowledge']; ?></td>
    <td><?php echo $g['mathematics']; ?></td>
    <td><?php echo $g['english']; ?></td>
    <td><?php echo $g['chichewa']; ?></td>
    <td><?php echo $g['social']; ?></td>
    <td><?php echo $g['lifeskills']; ?></td>
    <td><?php echo $g['expressive_arts']; ?></td>
    <td><?php echo $g['total']; ?></td>
    <td><?php echo $g['average']; ?></td>
    <td><?php echo $g['grade']; ?></td>
    <td><?php echo $g['status']; ?></td>
    <td><button onclick="generateReport(<?php echo $g['grade_id']; ?>)">
    Generate Report
</button> &nbsp;&nbsp; <br>
<a href="grades.php?edit=<?php echo $g['grade_id']; ?>">
    <button style="margin: 5px;">Edit</button>
</a></td>
</tr>
<?php } ?>

</table>
 
</div>

</div>


<div id="reportModal" style="
display:none;
position:fixed;
top:0; left:0;
width:100%; height:100%;
background:rgba(0,0,0,0.7);
">

<div style="
background:white;
width:90%;
height:90%;
margin:5% auto;
padding:10px;
overflow:auto;
position:relative;
">

<button onclick="closeModal()" style="float:right; width: 5%;background-color:red;">X</button>

<iframe id="reportFrame" style="width:100%; height:90%;"></iframe>

</div>
</div>


<script>
    function generateReport(id) {
    document.getElementById("reportModal").style.display = "block";
    document.getElementById("reportFrame").src = "reports.php?id=" + id;
}

function closeModal() {
    document.getElementById("reportModal").style.display = "none";

    
}

function returnteacher() {
    window.location.href = "class_teacher.php";
}

</script>

</body>
</html>