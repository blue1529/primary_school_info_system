<?php
    
    $PAGE_TITLE = "Teacher Registration";
    $PAGE_CSS = "teacher_registration.css";

    include "../include/header.php";
?>


    <!-- Inclue the header file  -->

<div class="form-container">
    <h2>Teacher Registration Form</h2>
    <div class="progress-bar">
        <div class="progress-step active" data-step="1">1. Personal Info</div>
        <div class="progress-step" data-step="2">2. Academic Info</div>
        <div class="progress-step" data-step="3">3. Other Details</div>
    </div>

    <form action="register.php" method="POST" id="multiStepForm">
        <!-- STEP 1 – Personal Details -->
        <div class="step active" id="step1">
            <h3>Personal Information</h3>
            <label for="first_name">First Name: <span class="required">*</span></label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="middle_name">Middle Name: <span class="required">*</span></label>
            <input type="text" id="middle_name" name="middle_name">  <!-- Middle Name not required-->

            <label for="last_name">Last Name: <span class="required">*</span></label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="phone_number">Phone Number: <span class="required">*</span></label>
            <input type="tel" id="phone_number" name="phone_number" required>

            <label for="email">Email: <span class="required">*</span></label>
            <input type="email" id="email" name="email" placeholder="sandrabanda@gmail.com" required>

            <div class="button-group">
                <button type="button" class="next-btn">Next</button>
            </div>
        </div>

        <!-- STEP 2 – Academic Details -->
        <div class="step" id="step2">
            <h3>Academic Information</h3>
            <label for="class_name">Class: <span class="required">*</span></label>
            <input type="text" id="class_name" name="class_name" placeholder="e.g., Standard 4A" required>

            <label for="subjects_taught">Subject: <span class="required">*</span></label>
            <select id="subjects_taught" name="subjects_taught" required>
                <option value="">-- Select an option --</option>
                <option value="agriculture">Agriculture</option>
                <option value="bible_knowledge">Bible Knowledge</option>
                <option value="mathematics">Mathematics</option>
                <option value="english">English</option>
                <option value="chichewa">Chichewa</option>
                <option value="social">Social</option>
                <option value="life_skills">Life Skills</option>
                <option value="expressive_arts">Expressive Arts</option>
            </select>

            <div class="button-group">
                <button type="button" class="prev-btn">Previous</button>
                <button type="button" class="next-btn">Next</button>
            </div>
        </div>

        <!-- STEP 3 – Other Details + Submit -->
        <div class="step" id="step3">
            <h3>Other Details</h3>
            <label for="gender">Gender: <span class="required">*</span></label>
            <select id="gender" name="gender" required>
                <option value="">--Select--</option>
                <option>Male</option>
                <option>Female</option>
            </select>

            <label for="place_of_residence">Place of Residence: <span class="required">*</span></label>
            <input type="text" id="place_of_residence" name="place_of_residence" placeholder="e.g Blantyre, Chilomoni" required>

            <div class="button-group">
                <button type="button" class="prev-btn">Previous</button>
                <button type="submit" id="submitBtn">Register</button>
            </div>
        </div>
    </form>
</div>



<!-- Include the footer file -->

<script src="teacher_registration.js"></script>
</body>
</html>