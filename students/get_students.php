<?php
include("../db.php");

$class = isset($class) && $class !== '' ? $class : (isset($_GET['class']) ? $_GET['class'] : '');
$return_to = isset($return_to) && $return_to !== '' ? $return_to : (isset($_GET['return_to']) ? $_GET['return_to'] : '');

$where = !empty($class) ? "WHERE class = '$class'" : "";
$result = $conn->query("SELECT * FROM Student $where ORDER BY student_id DESC");
?>

<link rel="stylesheet" href="../students/css/get_students.css">

<div class="std-list-wrap">
    <div class="std-list-head">
        <h3 class="std-list-title">
            <?php echo !empty($class) ? 'Students in ' . htmlspecialchars($class) : 'All Students'; ?>
        </h3>
        <a href="../studentreg.html" class="std-list-add">Add Student</a>
    </div>
    
    <table class="std-list-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Parent</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while($row = $result->fetch_assoc()): 
                $name = trim($row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name']);
                $parent = trim($row['parent_fname'] . ' ' . $row['parent_lname']);
            ?>
            <tr>
                <td><?php echo htmlspecialchars($name); ?></td>
                <td><?php echo htmlspecialchars($row['class']); ?></td>
                <td><?php echo htmlspecialchars($parent); ?></td>
                <td>
                    <?php
                    $defaultReturn = 'index.php?page=list' . (!empty($class) ? '&class=' . urlencode($class) : '');
                    $finalReturn = !empty($return_to) ? $return_to : $defaultReturn;
                    ?>
                    <a href="../students/index.php?page=profile&id=<?php echo $row['student_id']; ?>&return=<?php echo urlencode($finalReturn); ?>" class="std-list-view">View</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>