<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "school");

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $class = $_POST['class'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        // CHECK CLASS FOR TEACHER
        if ($user['role'] == "teacher" && $user['class'] != $class) {
            echo "❌ Wrong class";
        } else {

            $_SESSION['user'] = $user;
            header("Location: ../class_teacher/class_teacher.php");
        }
    } else {
        echo "❌ Invalid login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body { font-family: Arial; background:#eef; }
.form { width:300px; margin:50px auto; background:white; padding:30px; border-radius:10px; }
input { width:100%; padding:8px; margin:5px 0; }
button { width:100%; padding:10px; background:#2980b9; color:white; border:none; }
</style>
</head>
<body>

<div class="form">
<h2>Login</h2>

<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<input type="number" name="class" placeholder="Class (None for Headmaster)">
<button name="login">Login</button>
</form>
</div>

</body>
</html>