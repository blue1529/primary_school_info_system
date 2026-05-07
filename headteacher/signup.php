<?php
    require "../include/db_connect.php";


    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM users WHERE user_id='$id'");
        header("Location: ".$_SERVER['PHP_SELF']);
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $editUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id='$id'"));
    }

    if (isset($_POST['signup'])) {

    $role = $_POST['role'];

    if ($role == "teacher") {
        $username = $_POST['teacher_select'];
    } else {
        $username = $_POST['manual_username'];
    }
        $email = $_POST['user_email_login'];
        $password = password_hash($_POST['user_password_login'], PASSWORD_DEFAULT);
        $role = $_POST['role'];

        // Only teacher has class
        $class = ($role == "teacher") ? $_POST['class'] : NULL;

        mysqli_query($conn, "
            INSERT INTO users (username, email, password, role, class)
            VALUES ('$username','$email','$password','$role','$class')
        ");

        echo "<b style='color:green;'>Account created.</b>";
    }
    ?>

    <?php
    $teachers = mysqli_query($conn, "SELECT * FROM Teacher ORDER BY first_name ASC");
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="../class_teacher/grades.css">
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


    <!-- SELECT (FOR TEACHER) -->
    <select name="teacher_select" id="teacherSelect" onchange="fillEmailClass()" style="display:block;">
        <option value="">Select Teacher</option>

        <?php while($t = mysqli_fetch_assoc($teachers)) { ?>
        <option 
        value="<?php echo $t['first_name'].' '.$t['last_name']; ?>"
        data-email="<?php echo $t['email']; ?>"
        data-class="<?php echo $t['class']; ?>">
        <?php echo $t['first_name'].' '.$t['last_name']; ?>
        </option>
        <?php } ?>
    </select>

    <!-- INPUT (FOR HEADMASTER / TREASURER) -->
    <input type="text" name="manual_username" id="manualUsername" placeholder="Enter Username" style="display:none;">

        <input type="email" name="user_email_login" value="<?php echo isset($editUser) ? $editUser['email'] : ''; ?>" placeholder="Enter email" autocomplete="off" required>
    <input type="password" name="user_password_login" value="<?php echo isset($editUser) ? $editUser['email'] : ''; ?>" placeholder="Enter password" autocomplete="new-password" required>

    <select name="role" id="role" onchange="toggleClass()">
    <option value="teacher">Teacher</option>
    <option value="headmaster">Headmaster</option>
    <option value="treasurer">Treasurer</option>
    </select>

    <input type="number" name="class" value="<?php echo isset($editUser) ? $editUser['email'] : ''; ?>" autocomplete="off" id="classField" placeholder="Class Number"> <hr>

    <button name="signup"><?php echo isset($editUser) ? "Update" : "Assign"; ?></button>
    </form>
    </div>


    <hr>
    <h3 style="color:white;margin-left: 50px;">Users List</h3>

    <table border="1" style="width: 90%; background:white;margin: 50px;">
    <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Role</th>
    <th>Class</th>
    <th>Actions</th>
    </tr>

    <?php
    $users = mysqli_query($conn, "SELECT * FROM users");

    while($u = mysqli_fetch_assoc($users)) {
    ?>
    <tr>
    <td><?php echo $u['user_id']; ?></td>
    <td><?php echo $u['username']; ?></td>
    <td><?php echo $u['email']; ?></td>
    <td><?php echo $u['role']; ?></td>
    <td><?php echo $u['class']; ?></td>

    <td>
        
    <a href="?delete=<?php echo $u['user_id']; ?>" onclick="return confirmDelete()">
    <button  style="background:red;color:white;width: 20%;margin: 5px;">Delete</button>
    </a>

    <a href="?edit=<?php echo $u['user_id']; ?>">
    <button style="width: 20%;margin: 5px;">Edit</button>
    </a>
    </td>
    </tr>
    <?php } ?>
    </table>

        <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this user?");
    }

    function fillEmailClass() {
        let select = document.getElementById("teacherSelect");
        let option = select.options[select.selectedIndex];

        document.querySelector("[name='user_email_login']").value = option.getAttribute("data-email");
        document.getElementById("classField").value = option.getAttribute("data-class");
    }

    window.onload = function() {
        document.querySelector("form").reset();
    };


    function toggleClass() {
        let role = document.getElementById("role").value;

        let teacherSelect = document.getElementById("teacherSelect");
        let manualInput = document.getElementById("manualUsername");
        let classField = document.getElementById("classField");

        if (role === "teacher") {
            teacherSelect.style.display = "block";
            manualInput.style.display = "none";
            classField.style.display = "block";
        } else {
            teacherSelect.style.display = "none";
            manualInput.style.display = "block";
            classField.style.display = "none";
        }
    }

    function returnhead() {
        window.location.href = "index.php";
    }
    </script>

    </body>
    </html>