<?php
// require_once __DIR__ . "/../include/db_connect.php";
//  session_start();

// if (!isset($_SESSION['user'])) {
//     header("Location: login.php");
//     exit();
// } 

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Headmaster Dashboard</title>
        <link rel="stylesheet" href="styling/headmaster.css">
         <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="parent">
            <div class="header">
                <button id="toggle_btn" class="toggle-btn">☰</button>
                <h1>WELCOME</h1>

                <div class="nav-right">
        <a href="../class_teacher/logout.php">
<button style="background: #f3295b;color:white;">Logout</button>
</a>
    </div>
            </div>

            <div class="main">
                <div class="parent-sidebar" id="sidebar">
                    <ul class="child-sidebar">
                        <li><button class="side_btn"id="dashboard">Dashboard</button></li>
                        <li><button class="side_btn" id="std_details">Student details</button></li>
                        <li><button class="side_btn" id="teachers">Teachers</button></li>
                        <li><button class="side_btn" id="std_grades" >Student grades</button></li>
                        <!-- <li><button class="side_btn" id="classes" >Classes</button></li> -->
                        <!-- <li><button class="side_btn" id="std_status">Student Status</button></li> -->
                    </ul>
                </div>
                <div class="content" id="main_content">
                    <img src="images/dashboard3.jpg" alt="image of a classroom" class="dashboard-img">
                </div>
            </div>
        </div>
    </body>
    <script src="headmaster.js"></script>
</html>