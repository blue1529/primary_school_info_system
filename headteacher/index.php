<?php
// echo"hello world";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>headmaster dashboard</title>
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
                        <li><button class="side_btn"id="dashboard">Dashboard</button></li>
                        <li><button class="side_btn" id="std_details">Student details</button></li>
                        <li><button class="side_btn" id="teachers">Teachers</button></li>
                        <li><button class="side_btn" id="std_grades" >Student grades</button></li>
                        <li><button class="side_btn" id="classes" >Classes</button></li>
                        <li><button class="side_btn" id="std_status">Student Status</button></li>
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