<?php
require("../db.php");

session_start();


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
            header("Location:../headteacher/index.php");
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
            background: url("blacknwwhite.jpg") no-repeat center/cover;
 }

.form {     width:300px; 
            margin:50px auto; 
            background: #008081; 
            padding:30px; 
            border-radius:10px;
            margin-top: 100px;
             }

input {     width:100%; 
            padding:8px; 
            margin:5px 0;
            border-radius:10px;
            border:none;
        }

button {    width:100%; 
            padding:10px; 
            border-radius:10px;
            background: #0dad50;
            color:white; 
            border:none;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.51);
         }
button:hover {
    background: #4db478;
}
</style>
</head>
<body style="background: 173459">

<div>
    <button style="width: 12%; background: #27ae60" onclick="returnhome()">GO BACK</button>
</div>

<div class="form" >
<h2>Login</h2>

<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<input type="number" name="class" placeholder="Class (None for Headmaster)"> <br> <hr>
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