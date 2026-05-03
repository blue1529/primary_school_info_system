<?php
$conn = mysqli_connect("localhost", "root", "", "primary_school_info_system");

if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $class = ($role == "teacher") ? $_POST['class'] : NULL;

    mysqli_query($conn, "
        INSERT INTO users (username, email, password, role, class)
        VALUES ('$username','$email','$password','$role','$class')
    ");

    echo "✅ Account created. <a href='login.php'>Login</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body { font-family: Arial; background:#eef; }
.form { width:300px; margin:50px auto; background:white; padding:30px; border-radius:10px; }
input, select { width:100%; padding:8px; margin:5px 0; }
button { width:100%; padding:10px; background:#27ae60; color:white; border:none; }
</style>
</head>
<body>

<div class="form">
<h2>Sign Up</h2>

<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<select name="role" id="role" onchange="toggleClass()">
<option value="teacher">Teacher</option>
<option value="headmaster">Headmaster</option>
</select>

<input type="number" name="class" id="classField" placeholder="Class Number">

<button name="signup">Sign Up</button>
</form>
</div>

<script>
function toggleClass() {
    let role = document.getElementById("role").value;
    document.getElementById("classField").style.display =
        (role === "teacher") ? "block" : "none";
}
</script>

</body>
</html>