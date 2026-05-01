<?php
require("../db.php");

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

    // CHECK DUPLICATE
    $check = mysqli_query($conn, "SELECT * FROM grades WHERE student_id='$student_id' AND term='$term'");

    if (mysqli_num_rows($check) > 0) {
        $message = "This student already has grades for this term!";
    } else {

        // SUBJECTS
        $math = $_POST['mathematics'];
        $eng = $_POST['english'];
        $bio = $_POST['biology'];
        $chem = $_POST['chemistry'];
        $phy = $_POST['physics'];
        $geo = $_POST['geography'];
        $hist = $_POST['history'];
        $comp = $_POST['computer'];

        // TOTAL + AVERAGE
        $total = $math + $eng + $bio + $chem + $phy + $geo + $hist + $comp;
        $average = $total / 8;

        // GRADE LOGIC
        if ($average >= 75) $grade = "A";
        elseif ($average >= 65) $grade = "B";
        elseif ($average >= 50) $grade = "C";
        elseif ($average >= 40) $grade = "D";
        else $grade = "F";

        // PASS / FAIL
        $status = ($average >= 50) ? "PASS" : "FAIL";

        // INSERT
        $sql = "INSERT INTO grades 
        (student_id, term, mathematics, english, biology, chemistry, physics, geography, history, computer, total, average, grade, status)
        VALUES 
        ('$student_id','$term','$math','$eng','$bio','$chem','$phy','$geo','$hist','$comp','$total','$average','$grade','$status')";

        if (mysqli_query($conn, $sql)) {
            $message = "Grades saved successfully!";
        } else {
            $message = "Error saving grades!";
        }
    }
}


   //FETCH STUDENTS
$students = mysqli_query($conn, "
    SELECT student_id, first_name, last_name 
    FROM student
    ORDER BY first_name ASC, last_name ASC
");

//fetch grades
$grades = mysqli_query($conn, "
   SELECT g.*, s.first_name, s.last_name 
FROM grades g
JOIN student s ON g.student_id = s.student_id
ORDER BY g.total DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Grades</title>

<link rel="stylesheet" href="grades.css">

</head>

<body>

<div class="container">

<h2>Enter Grades</h2>

<?php if ($message != "") echo "<div class='message'>$message</div>"; ?>

<!-- FORM SECTION-->
<div class="form-box">

<form method="POST">

<?php if ($edit_mode) { ?>
    <input type="hidden" name="grade_id" value="<?php echo $edit_data['grade_id']; ?>">
<?php } ?>

<div class="grid">

    <!-- STUDENT SELECT -->
   <select name="student_id" required>
    <option value="">Select Student</option>

    <?php
    $students = mysqli_query($conn, "SELECT student_id, first_name, last_name FROM student ORDER BY first_name ASC");

    while($row = mysqli_fetch_assoc($students)) {
        $selected = ($edit_mode && $edit_data['student_id'] == $row['student_id']) ? "selected" : "";
        echo "<option value='{$row['student_id']}' $selected>{$row['first_name']} {$row['last_name']}</option>";
    }
    ?>
</select>

    <!-- TERM -->
    <select name="term" required>
        <option value="">Select Term</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
    </select>

    <!-- SUBJECTS -->
     <input type="number" name="mathematics" placeholder="Mathematics" required
value="<?php echo $edit_mode ? $edit_data['mathematics'] : ''; ?>">
<input type="number" name="english" placeholder="english" required
value="<?php echo $edit_mode ? $edit_data['english'] : ''; ?>">
<input type="number" name="biology" placeholder="biology" required
value="<?php echo $edit_mode ? $edit_data['biology'] : ''; ?>">
<input type="number" name="chemistry" placeholder="chemistry" required
value="<?php echo $edit_mode ? $edit_data['chemistry'] : ''; ?>">
<input type="number" name="physics" placeholder="physics" required
value="<?php echo $edit_mode ? $edit_data['physics'] : ''; ?>">
<input type="number" name="geography" placeholder="geography" required
value="<?php echo $edit_mode ? $edit_data['geography'] : ''; ?>">
<input type="number" name="history" placeholder="history" required
value="<?php echo $edit_mode ? $edit_data['history'] : ''; ?>">
<input type="number" name="computer" placeholder="computer" required
value="<?php echo $edit_mode ? $edit_data['computer'] : ''; ?>">

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
    <td><?php echo $g['total']; ?></td>
    <td><?php echo $g['average']; ?></td>
    <td><?php echo $g['grade']; ?></td>
    <td><?php echo $g['status']; ?></td>
    <td><button onclick="generateReport(<?php echo $g['grade_id']; ?>)">
    Generate Report
</button> &nbsp;&nbsp; <a href="grades.php?edit=<?php echo $g['grade_id']; ?>">
    <button>Edit</button>
</a></td>
</tr>
<?php } ?>

</table>

</div>

</div>


<!-- MODAL -->
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

<button onclick="closeModal()" style="float:right;">X</button>

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
</script>

</body>
</html>