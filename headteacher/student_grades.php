<?php
require_once __DIR__ . "/../include/db_connect.php";
// session_start();

// if (!isset($_SESSION['user'])) {
//     header("Location: login.php");
//     exit();
// }

// Get selected page
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Headmaster Dashboard</title>
    <link rel="stylesheet" href="styling/headmaster.css">
</head>
<body>

<div class="parent">
    <div class="header">
        <button id="toggle_btn" class="toggle-btn">☰</button>
        <h1>WELCOME</h1>
    </div>

    <div class="main">
        <div class="parent-sidebar" id="sidebar">
            <ul class="child-sidebar">
                <li><a href="student_grades.php?page=dashboard"><button class="side_btn">Dashboard</button></a></li>
                <li><a href="student_grades.php?page=student_details"><button class="side_btn">Student Details</button></a></li>
                <li><a href="student_grades.php?page=teachers"><button class="side_btn">Teachers</button></a></li>
                <li><a href="student_grades.php?page=student_grades"><button class="side_btn">Student Grades</button></a></li>
            </ul>
        </div>

        <div class="content" id="main_content">

            <?php
            switch($page) {

                case 'student_grades':
                    echo "
                    <h3>STUDENT GRADES</h3>
                    <div class='student_grades'>
                        <a href='student_grades.php?page=standard1'><button class='grades'>STANDARD 1</button></a>
                        <a href='student_grades.php?page=standard2'><button class='grades'>STANDARD 2</button></a>
                        <a href='student_grades.php?page=standard3'><button class='grades'>STANDARD 3</button></a>
                        <a href='student_grades.php?page=standard4'><button class='grades'>STANDARD 4</button></a>
                        <a href='student_grades.php?page=standard5'><button class='grades'>STANDARD 5</button></a>
                        <a href='student_grades.php?page=standard6'><button class='grades'>STANDARD 6</button></a>
                        <a href='student_grades.php?page=standard7'><button class='grades'>STANDARD 7</button></a>
                        <a href='student_grades.php?page=standard8'><button class='grades'>STANDARD 8</button></a>
                    </div>
                    ";
                    break;

                case 'standard1':
                case 'standard2':
                case 'standard3':
                case 'standard4':
                case 'standard5':
                case 'standard6':
                case 'standard7':
                case 'standard8':
                    $num = str_replace('standard', '', $page); // extracts "1" through "8"
                    $result = $conn->query("
                        SELECT s.first_name, s.last_name, g.agriculture, g.english,
                               g.bible_knowledge, g.mathematics, g.chichewa, g.social,
                               g.lifeskills, g.expressive_arts, g.total, g.average, g.grade, g.status
                        FROM grades g
                        JOIN student s ON g.student_id = s.student_id
                        WHERE s.class = '$num'
                    ");
                    echo "<h3>STANDARD $num GRADES</h3>";
                    echo "<table border='1'>
                            <tr>
                                <th>Name</th>
                                <th>Maths</th>
                                <th>English</th>
                                <th>Chichewa</th>
                                <th>Social</th>
                                <th>Life skills</th>
                                <th>Expressive arts</th>
                                <th>Agriculture</th>
                                <th>Bible knowledge</th>
                                <th>Total</th>
                                <th>Average</th>
                                <th>Grade</th>
                                <th>Status</th>
                            </tr>";
                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['first_name']} {$row['last_name']}</td>
                                    <td>{$row['mathematics']}</td>
                                    <td>{$row['english']}</td>
                                    <td>{$row['biology']}</td>
                                    <td>{$row['chemistry']}</td>
                                    <td>{$row['physics']}</td>
                                    <td>{$row['geography']}</td>
                                    <td>{$row['history']}</td>
                                    <td>{$row['computer']}</td>
                                    <td>{$row['total']}</td>
                                    <td>{$row['average']}</td>
                                    <td>{$row['grade']}</td>
                                    <td>{$row['status']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='13'>No grades found for Standard $num</td></tr>";
                    }
                    echo "</table>";
                    break;

                case 'teachers':
                    echo "
                    <h3>TEACHERS</h3>
                    <div class='teachers_buttons'>
                        <a href='../Teachers/teacher_registration/teacher_registration.php'>
                            <button class='t_btn'>Register a Teacher</button>
                        </a>
                        <button class='t_btn'>Assign Teacher</button>
                    </div>
                    ";
                    break;

                case 'student_details':
                    echo "
                    <h3>STUDENT DETAILS</h3>
                    <div class='student_grades'>
                        <a href='student_grades.php?page=std1_details'><button class='grades'>STANDARD 1</button></a>
                        <a href='student_grades.php?page=std2_details'><button class='grades'>STANDARD 2</button></a>
                        <a href='student_grades.php?page=std3_details'><button class='grades'>STANDARD 3</button></a>
                        <a href='student_grades.php?page=std4_details'><button class='grades'>STANDARD 4</button></a>
                        <a href='student_grades.php?page=std5_details'><button class='grades'>STANDARD 5</button></a>
                        <a href='student_grades.php?page=std6_details'><button class='grades'>STANDARD 6</button></a>
                        <a href='student_grades.php?page=std7_details'><button class='grades'>STANDARD 7</button></a>
                        <a href='student_grades.php?page=std8_details'><button class='grades'>STANDARD 8</button></a>
                    </div>
                    ";
                    break;

                case 'std1_details':
                case 'std2_details':
                case 'std3_details':
                case 'std4_details':
                case 'std5_details':
                case 'std6_details':
                case 'std7_details':
                case 'std8_details':
                    $num = str_replace(['std', '_details'], '', $page); // extracts "1" through "8"
                    $result = $conn->query("SELECT * FROM student WHERE class = '$num'");
                    echo "<h3>STANDARD $num STUDENT DETAILS</h3>";
                    echo "<table border='1'>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Parent Name</th>
                                <th>Parent Phone</th>
                                <th>Parent Email</th>
                                <th>Address</th>
                                <th>Special Needs</th>
                                <th>Enrollment Date</th>
                            </tr>";
                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['first_name']} {$row['middle_name']} {$row['last_name']}</td>
                                    <td>{$row['gender']}</td>
                                    <td>{$row['date_of_birth']}</td>
                                    <td>{$row['parent_fname']} {$row['parent_lname']}</td>
                                    <td>{$row['parent_phone']}</td>
                                    <td>{$row['parent_email']}</td>
                                    <td>{$row['address']}</td>
                                    <td>{$row['special_needs']}</td>
                                    <td>{$row['enrollment_date']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No students found for Standard $num</td></tr>";
                    }
                    echo "</table>";
                    break;

                case 'dashboard':
                default:
                    echo "<img src='images/dashboard3.jpg' alt='dashboard image' class='dashboard-img'>";
                    break;
            }
            ?>
            
        </div>
    </div>
</div>
<script src="student_grades.js"></script>
</body>

</html>
