<?php
session_start();
$conn = new mysqli("localhost", "root", "", "primary_school_login");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
     $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if ($pass === $row['password']) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if ($_SESSION['role'] == 'headmaster') {
            header("Location: headmaster_panel.php");
        } elseif ($_SESSION['role'] == 'teacher') {
            header("Location: teacher_portal.php");
        } else {
            header("Location: parent_view.php");
        }
        exit();
        }else {
            echo "Incorrect password.";
        }
    }
}
?>