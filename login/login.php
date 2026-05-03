<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "primary_school_info_system");

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $class = $_POST['class'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        // CHECK CLASS FOR TEACHER
        if ($user['role'] == "teacher" && $user['class'] != $class) {
            echo "Wrong class";
        } else {

            $_SESSION['user'] = $user;
                    if ($user['role'] == "headmaster") {
            header("Location:../headteacher/headteacher.php");
        } else {
            header("Location: ../class_teacher/class_teacher.php");
        }
        exit();


        }
    } else {
        echo "Invalid login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {      font-family: Arial; 
            background-color: #173459;  }

.form {     width:300px; 
            margin:50px auto; 
            background: #008081; 
            padding:30px; 
            border-radius:10px; }

input {     width:100%; 
            padding:8px; 
            margin:5px 0; }

button {    width:100%; 
            padding:10px; 
            background: #2980b9; 
            color:white; 
            border:none; }
</style>
</head>
<body style="background: #008181">

<div>
    <button style="width: 12%; background: black" onclick="returnhome()">GO BACK</button>
</div>

<div class="form" >
<h2>Login</h2>

<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<input type="number" name="class" placeholder="Class (None for Headmaster)">
<button name="login">Login</button>
</form>
</div>


<script>

function returnhome() {
    window.location.href = "index.php";
}

</script>
</body>
</html>