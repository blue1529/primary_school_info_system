<?php
require_once __DIR__ . "/../include/db_connect.php";

// Check if user is logged in, if not redirect to login page
// if (!isset($_SESSION['user'])) {
//     header("Location: ../login/index.php");
//     exit();
// }

// // Get user role from session for access control
// $user_role = $_SESSION['user']['role'] ?? 'headmaster'; // Default to headmaster
// $user_name = $_SESSION['user']['name'] ?? 'User';

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

        <!-- SIDEBAR -->
        <div class="parent-sidebar" id="sidebar">
            <ul class="child-sidebar">
                <li><a href="./index.php?page=dashboard"><button class="side_btn">Dashboard</button></a></li>
                <li><a href="./index.php?page=student_details"><button class="side_btn">Student Details</button></a></li>
                <li><a href="./index.php?page=teachers"><button class="side_btn">Teachers</button></a></li>
                <li><a href="./index.php?page=student_grades"><button class="side_btn">Student Grades</button></a></li>
            </ul>
        </div>

        <!-- MAIN CONTENT -->
        <div class="content" id="main_content">

            
            <?php
            switch($page) {

                /* ======================
                   STUDENT GRADES MENU
                ====================== */
                case 'student_grades':
                    echo "
                    <h3>STUDENT GRADES</h3>
                    <div class='student_grades'>
                        <a href='index.php?page=standard1'><button class='grades'>STANDARD 1</button></a>
                        <a href='index.php?page=standard2'><button class='grades'>STANDARD 2</button></a>
                        <a href='index.php?page=standard3'><button class='grades'>STANDARD 3</button></a>
                        <a href='index.php?page=standard4'><button class='grades'>STANDARD 4</button></a>
                        <a href='index.php?page=standard5'><button class='grades'>STANDARD 5</button></a>
                        <a href='index.php?page=standard6'><button class='grades'>STANDARD 6</button></a>
                        <a href='index.php?page=standard7'><button class='grades'>STANDARD 7</button></a>
                        <a href='index.php?page=standard8'><button class='grades'>STANDARD 8</button></a>
                    </div>
                    ";
                    break;


                /* ======================
                   STANDARD GRADES PAGES
                ====================== */
                case 'standard1':
                case 'standard2':
                case 'standard3':
                case 'standard4':
                case 'standard5':
                case 'standard6':
                case 'standard7':
                case 'standard8':

                    $num = str_replace('standard', '', $page);

                    $result = $conn->query("
                        SELECT s.first_name, s.last_name,
                               g.mathematics, g.english, g.chichewa,
                               g.social, g.lifeskills, g.expressive_arts,
                               g.agriculture, g.bible_knowledge,
                               g.total, g.average, g.grade, g.status
                        FROM grades g
                        JOIN student s ON g.student_id = s.student_id
                        WHERE s.class = '$num'
                    ");

                    echo "<h3>STANDARD $num GRADES</h3>";

                    echo "<table class = 'student-table'>
                             <tr>
                                <th>Name</th>
                                <th>Maths</th>
                                <th>English</th>
                                <th>Chichewa</th>
                                <th>Social</th>
                                <th>Life Skills</th>
                                <th>Expressive Arts</th>
                                <th>Agriculture</th>
                                <th>Bible Knowledge</th>
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
                                    <td>{$row['chichewa']}</td>
                                    <td>{$row['social']}</td>
                                    <td>{$row['lifeskills']}</td>
                                    <td>{$row['expressive_arts']}</td>
                                    <td>{$row['agriculture']}</td>
                                    <td>{$row['bible_knowledge']}</td>
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


                /* ======================
                   TEACHERS
                ====================== */
                case 'teachers':
                    echo "
                    <h3>TEACHERS</h3>
                    <div class='teachers_buttons'>
                        <a href='../teacher_registration/index.php'>
                            <button class='t_btn'>Register a Teacher</button>
                        </a>
                        <a href='signup.php'>
                            <button class='t_btn' >Assign Teacher</button>
                        </a>
                    </div>
                    ";
                    break;


                /* ======================
                   STUDENT DETAILS MENU
                ====================== */
                case 'student_details':
                    echo "
                    <h3>STUDENT DETAILS</h3>
                    <div class='student_grades'>
                        <a href='index.php?page=std1_details'><button class='grades'>STANDARD 1</button></a>
                        <a href='index.php?page=std2_details'><button class='grades'>STANDARD 2</button></a>
                        <a href='index.php?page=std3_details'><button class='grades'>STANDARD 3</button></a>
                        <a href='index.php?page=std4_details'><button class='grades'>STANDARD 4</button></a>
                        <a href='index.php?page=std5_details'><button class='grades'>STANDARD 5</button></a>
                        <a href='index.php?page=std6_details'><button class='grades'>STANDARD 6</button></a>
                        <a href='index.php?page=std7_details'><button class='grades'>STANDARD 7</button></a>
                        <a href='index.php?page=std8_details'><button class='grades'>STANDARD 8</button></a>
                    </div>
                    ";
                    break;


                /* ======================
                   STUDENT DETAILS PAGES
                ====================== */
                case 'std1_details':
                case 'std2_details':
                case 'std3_details':
                case 'std4_details':
                case 'std5_details':
                case 'std6_details':
                case 'std7_details':
                case 'std8_details':

                    $num = str_replace(['std', '_details'], '', $page);

                    $result = $conn->query("SELECT * FROM student WHERE class = '$num'");

                    echo "<h3>STANDARD $num STUDENT DETAILS</h3>";

                    echo "<table class = 'student-table'>
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


                /* ======================
                   DASHBOARD
                ====================== */
                case 'dashboard':
                default:
                    echo "<img src='images/dashboard3.jpg' alt='dashboard image' class='dashboard-img'>";
                    break;
            } 
            
            ?>
        

            

        </div>
    </div>
</div>

<script src="headmaster.js"></script>

</body>
</html>