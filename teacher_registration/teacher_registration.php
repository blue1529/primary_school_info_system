<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="teacher_registration.css">
    <title>REGISTER TEACHER | </title>
</head>
<body>
    <!-- include the header using php -->

    <main>
        <!-- mini-heading -->
        <div class="heading">
            <h1 class="main-heading">REGISTER TEACHER</h1>
            <i class="sub-heading">_ fast - secure - reliable _</i>    
        </div>    
        
        <!-- form -->
        <div class="form-body">     
            <form class="form" action="register.php" method="POST">
                <!-- First -->
                <div class="input-field">
                    <label for="fname">First Name <span class="required">*</span></label>
                    <input type="text" name="fname" id="fname" placeholder="Enter your first name" required>
                </div>
                <!-- Middle -->
                <div class="input-field">
                    <label for="mname">Middle Name </label>
                    <input type="text" name="mname" id="mname" placeholder="Enter your middle name">
                </div>
                <!-- Last -->
                <div class="input-field">
                    <label for="lname">Last Name <span class="required">*</span></label>
                    <input type="text" name="lname" id="lname" placeholder="Enter your last name" required>
                </div>

                <!-- Email -->
                <div class="input-field">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>

                <div class="input-field">
                    <label for="password">Password <span class="required">*</span></label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>

                <div class="input-field">
                    <label for="confirm_password">Confirm Password <span class="required">*</span></label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required>
                </div>

                <button type="submit" class="submit-btn">Register</button>

            </form>  
            
            <!-- side image -->
            <div class="side-image">
                <img src="image.png" alt="teacher" class="side-image-pic" >
            </div>
        </div>
    
    
    
    </main>


</body>
</html>