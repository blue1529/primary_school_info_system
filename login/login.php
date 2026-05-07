<?php
require_once __DIR__ . "/../include/db_connect.php";
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");

if (isset($_POST['login'])) {

    $email = $_POST['user_email_login'];
    $password = $_POST['user_password_login'];
    $class = $_POST['class'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        if ($user['role'] == "teacher") {

            // Check class for teacher
            if ($user['class'] != $class) {
                echo "<b style='color:red;margin-left:50%; margin-top:50%;'>WRONG CLASS</b>";
                exit();
            }

            $_SESSION['user'] = $user;
            header("Location: ../class_teacher/class_teacher.php");
            exit();

        } elseif ($user['role'] == "headmaster") {

            $_SESSION['user'] = $user;
            header("Location: ../headteacher/index.php");
            exit();

        } elseif ($user['role'] == "treasurer") {

            $_SESSION['user'] = $user;
            header("Location: ../treasurer/index.php");
            exit();

        } else {
            echo "Unknown role";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', Arial, sans-serif;
    background: url("login_bg.jpg") no-repeat center/cover;
}

.form {
    width: 300px;
    margin: 50px auto;
    background: #008081;
    padding: 30px;
    padding-right: 45px;
    border-radius: 10px;
}

input {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    border-radius: 10px;
    border: none;
}

button {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    background: #0dad50;
    color: white;
    border: none;
    box-shadow: 6px 8px 32px 0 rgba(0, 0, 0, 0.51);
}

button:hover {
    background: #4db478;
}
</style>

</head>

<body style="background: 173459">

<div>
    <button style="width: 12%; background: #27a60; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.64);" onclick="returnhome()">GO BACK</button>
</div>

<div class="form">
    <h2>Login</h2>

    <form method="POST" autocomplete="off">
        <input type="email" name="user_email_login" placeholder="Enter your email" autocomplete="off" required>

        <input type="password" name="user_password_login" placeholder="Enter your password" autocomplete="new-password" required>

        <input type="number" name="class" id="classField" placeholder="Class (Only for Teacher)">
        <br>
        <hr>

        <button name="login">Login</button>
    </form>
</div>

<script>
// window.onload = function() {
//     document.querySelector("form").reset();
// };

function returnhome() {
    window.location.href = "index.php";
}

window.onload = function () {
    let inputs = document.querySelectorAll("input");

    inputs.forEach(input => {
        input.value = "";
    });
};
</script>

</body>
</html>