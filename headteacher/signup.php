<?php
require("../db.php");

if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['user_email_login'];
    $password = password_hash($_POST['user_password_login'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $class = ($role == "teacher") ? $_POST['class'] : NULL;

    mysqli_query($conn, "
        INSERT INTO users (username, email, password, role, class)
        VALUES ('$username','$email','$password','$role','$class')
    ");

   echo "<b style='color:green;'>Account created.</b>";
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body { font-family: Arial; background: #173459; }
.form { width:300px; margin:50px auto; background: #008081; padding:30px; border-radius:10px; }
input, select { width:100%; padding:8px; margin:5px 0;border-radius:10px;  border:none;}
button { width:100%; padding:10px;  border-radius:10px;
            background: #0dad50; color:white; border:none; 
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.58);
        }

button:hover {
    background: #4db478;
}
</style>
</head>
<body>

<div>
    <button style="width: 12%; background: #27ae60" onclick="returnhead()">GO BACK</button>
</div>

<div class="form">
<h2>ASSIGN A TEACHER</h2>


<form method="POST" autocomplete="off">
    <input type="text" name="username" autocomplete="off" placeholder="Username" required>
     <input type="email" name="user_email_login" placeholder="Enter email" autocomplete="off" required>
<input type="password" name="user_password_login" placeholder="Enter password" autocomplete="new-password" required>

<select name="role" id="role" onchange="toggleClass()">
<option value="teacher">Teacher</option>
<option value="headmaster">Headmaster</option>
</select>

<input type="number" name="class" autocomplete="off" id="classField" placeholder="Class Number"> <hr>

<button name="signup">Assign</button>
</form>
</div>

<script>


window.onload = function() {
    document.querySelector("form").reset();
};


function toggleClass() {
    let role = document.getElementById("role").value;
    document.getElementById("classField").style.display =
        (role === "teacher") ? "block" : "none";
}

function returnhead() {
    window.location.href = "index.php";
}
</script>

</body>
</html>