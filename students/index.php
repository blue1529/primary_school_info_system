<?php
session_start();
include("../db.php");

$page = isset($_GET['page']) ? $_GET['page'] : 'list';
$student_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$class = isset($_GET['class']) ? $_GET['class'] : '';
$section = isset($_GET['section']) ? $_GET['section'] : 'profile';
$return = isset($_GET['return']) ? $_GET['return'] : '';
$return_param = !empty($return) ? '&return=' . urlencode($return) : '';

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save_attendance'])) {
        $stmt = $conn->prepare("INSERT INTO Attendance (student_id, date, status, remarks) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $student_id, $_POST['date'], $_POST['status'], $_POST['remarks']);
        $stmt->execute();
        $_SESSION['success'] = "Attendance saved";
        header("Location: index.php?page=profile&id=$student_id&section=attendance$return_param");
        exit;
    }
    
    if (isset($_POST['save_grade'])) {
        $subject = $_POST['subject'];
        $score = $_POST['score'];
        $conn->query("UPDATE Grades SET $subject = $score WHERE student_id = $student_id");
        
        // Recalculate total and average
        $g = $conn->query("SELECT * FROM Grades WHERE student_id = $student_id")->fetch_assoc();
        $total = $g['mathematics'] + $g['english'] + $g['biology'] + $g['chemistry'] + 
                 $g['physics'] + $g['geography'] + $g['history'] + $g['computer'];
        $average = $total / 8;
        $grade = getGradeLetter($average);
        $status = ($average >= 50) ? 'Pass' : 'Fail';
        
        $conn->query("UPDATE Grades SET total = $total, average = $average, grade = '$grade', status = '$status' WHERE student_id = $student_id");
        
        $_SESSION['success'] = "Grade saved";
        header("Location: index.php?page=profile&id=$student_id&section=grades$return_param");
        exit;
    }
    
    if (isset($_POST['edit_student'])) {
        $stmt = $conn->prepare("UPDATE Student SET first_name=?, middle_name=?, last_name=?, class=?, gender=?, date_of_birth=?, parent_fname=?, parent_lname=?, parent_phone=?, parent_email=?, address=? WHERE student_id=?");
        $stmt->bind_param("sssssssssssi", $_POST['first_name'], $_POST['middle_name'], $_POST['last_name'], $_POST['class'], $_POST['gender'], $_POST['date_of_birth'], $_POST['parent_fname'], $_POST['parent_lname'], $_POST['parent_phone'], $_POST['parent_email'], $_POST['address'], $student_id);
        $stmt->execute();
        $_SESSION['success'] = "Student updated";
        header("Location: index.php?page=profile&id=$student_id$return_param");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
    <link rel="stylesheet" href="css/student.css">
</head>
<body>

<div class="dashboard">
    <div class="header"><h1>Student Management</h1></div>
    <div class="nav">
        <a href="index.php?page=list">Students</a>
    </div>
    <div class="content">
        
        <?php if(isset($_SESSION['success'])): ?>
            <div class="message message-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        
       <!-- student list page -->
        <?php if ($page == 'list'): ?>
        <?php $return_to = 'index.php?page=list' . (!empty($class) ? '&class=' . urlencode($class) : ''); ?>
        <?php include("get_students.php"); ?>
        <?php endif; ?>
        
      <!-- tudent profile page -->
        <?php if ($page == 'profile' && $student_id > 0): 
            $student = $conn->query("SELECT * FROM Student WHERE student_id = $student_id")->fetch_assoc();
            if ($student) {
                $name = trim($student['first_name'] . ' ' . $student['middle_name'] . ' ' . $student['last_name']);
                $parent = trim($student['parent_fname'] . ' ' . $student['parent_lname']);
                $class = $student['class'];
            }
            $default_back = "index.php?page=list" . (!empty($class) ? '&class=' . urlencode($class) : '');
            $back_url = !empty($return) ? $return : $default_back;
        ?>
        <div class="card">
            <a href="<?php echo htmlspecialchars($back_url); ?>" class="back-link" onclick="if (window.history.length > 1) { window.history.back(); return false; }">← Back</a>
            <h2><?php echo htmlspecialchars($name); ?></h2>
            
            <div class="tabs">
                <a href="index.php?page=profile&id=<?php echo $student_id; ?>&section=profile<?php echo $return_param; ?>" class="tab <?php echo $section=='profile'?'active':''; ?>">Profile</a>
                <a href="index.php?page=profile&id=<?php echo $student_id; ?>&section=attendance<?php echo $return_param; ?>" class="tab <?php echo $section=='attendance'?'active':''; ?>">Attendance</a>
                <a href="index.php?page=profile&id=<?php echo $student_id; ?>&section=grades<?php echo $return_param; ?>" class="tab <?php echo $section=='grades'?'active':''; ?>">Grades</a>
            </div>
            
            <!--  profile tab-->
            <div id="profile" class="tab-pane <?php echo $section=='profile'?'active':''; ?>">
                <table class="info-table">
                    <tr><th>Student ID</th><td><?php echo $student['student_id']; ?></td></tr>
                    <tr><th>Class</th><td><?php echo htmlspecialchars($student['class']); ?></td></tr>
                    <tr><th>Gender</th><td><?php echo htmlspecialchars($student['gender']); ?></td></tr>
                    <tr><th>Date of Birth</th><td><?php echo $student['date_of_birth']; ?></td></tr>
                    <tr><th>Parent</th><td><?php echo htmlspecialchars($parent); ?></td></tr>
                    <tr><th>Parent Phone</th><td><?php echo htmlspecialchars($student['parent_phone']); ?></td></tr>
                    <tr><th>Parent Email</th><td><?php echo htmlspecialchars($student['parent_email']); ?></td></tr>
                    <tr><th>Address</th><td><?php echo nl2br(htmlspecialchars($student['address'])); ?></td></tr>
                </table>

                <button type="button" class="btn edit-btn">Edit Student</button>

                <div class="profile-edit-form hidden" id="profileEditForm" hidden>
                    <h3>Edit Student</h3>
                    <form method="POST" class="profile-edit-fields">
                        <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
                        <input type="text" name="first_name" placeholder="First Name" value="<?php echo htmlspecialchars($student['first_name']); ?>" required>
                        <input type="text" name="middle_name" placeholder="Middle Name" value="<?php echo htmlspecialchars($student['middle_name']); ?>">
                        <input type="text" name="last_name" placeholder="Last Name" value="<?php echo htmlspecialchars($student['last_name']); ?>" required>
                        <input type="text" name="class" placeholder="Class" value="<?php echo htmlspecialchars($student['class']); ?>" required>
                        <select name="gender">
                            <option value="Male" <?php echo $student['gender']=='Male'?'selected':''; ?>>Male</option>
                            <option value="Female" <?php echo $student['gender']=='Female'?'selected':''; ?>>Female</option>
                        </select>
                        <input type="date" name="date_of_birth" value="<?php echo $student['date_of_birth']; ?>">
                        <input type="text" name="parent_fname" placeholder="Parent First Name" value="<?php echo htmlspecialchars($student['parent_fname']); ?>">
                        <input type="text" name="parent_lname" placeholder="Parent Last Name" value="<?php echo htmlspecialchars($student['parent_lname']); ?>">
                        <input type="text" name="parent_phone" placeholder="Parent Phone" value="<?php echo htmlspecialchars($student['parent_phone']); ?>">
                        <input type="email" name="parent_email" placeholder="Parent Email" value="<?php echo htmlspecialchars($student['parent_email']); ?>">
                        <textarea name="address" placeholder="Address"><?php echo htmlspecialchars($student['address']); ?></textarea>
                        <button type="submit" name="edit_student" class="btn">Update Student</button>
                    </form>
                </div>
            </div>
            
            <!-- attendance tab -->
            <div id="attendance" class="tab-pane <?php echo $section=='attendance'?'active':''; ?>">
                <form method="POST" class="inline-form">
                    <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
                    <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                    <select name="status" required>
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                        <option value="Late">Late</option>
                    </select>
                    <input type="text" name="remarks" placeholder="Remarks">
                    <button type="submit" name="save_attendance" class="btn-sm">Save</button>
                </form>
                <table class="student-table">
                    <thead><tr><th>Date</th><th>Status</th><th>Remarks</th></tr></thead>
                    <tbody>
                        <?php
                        $att = $conn->query("SELECT * FROM Attendance WHERE student_id = $student_id ORDER BY date DESC");
                        while($row = $att->fetch_assoc()):
                        ?>
                        <tr><td><?php echo $row['date']; ?></td><td><?php echo $row['status']; ?></td><td><?php echo htmlspecialchars($row['remarks']); ?></td></tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            </div>
        
        <?php endif; ?>
        
    </div>
</div>

<script src="js/student.js"></script>
</body>
</html>