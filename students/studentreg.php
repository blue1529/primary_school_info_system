<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        h1{
            text-align: center;  
        }
        body{
            background: linear-gradient(to right,#e7dfdf, #305b93);
            font-family: 'Poppins', Arial, sans-serif;
        }
        form{
            background : linear-gradient(to left,#e7dfdf,#e7dfdf);
            padding: 25px;
            border-radius: 10px;
            width: 80%;
            margin: 7% ;
        }
       input{
          border-radius: 5px;
            padding: 7px;
            border: 2px solid #1a1d20;
            background-color: white;
            outline: none;
       }
        fieldset {
            border: none;
            background-color: rgba(0, 0, 0, 0.05);/*translucent*/
            border-radius: 10px;
            padding: 20px;
        }
        select {
            border-radius: 50px;
            padding: 10px 20px;
            border: 2px solid #66c2ff;
            background-color: white;
            outline: none;
        }

        select:focus {
            border-color: #3399ff;
        }

          button {
          width:12%; padding:10px;  border-radius:10px;
            background: #0dad50; color:white; border:none; 
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.58);
        }
        #registration:hover{
            background-color: #66c2ff;
        }
        
        #reset:hover{
            background-color: #66c2ff;
        }
        
    </style>
</head>
<body> 


     <div class="nav-right">
    <button style="background: #27ae60 ; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.507);" onclick="returntoteacher()">GO BACK</button>
</div>


    <h1> STUDENT REGISTRATION FORM</h1>
    <form method="POST" action="save_student.php">
    <fieldset id="step1">
       <legend> <b>child's details</b> </legend>
        <label for="fname"> First Name : </label>
        <input type="text" name="fname" id="fname" required>&nbsp; 
        <label for="mname"> Middle Name : </label>
        <input type="text" name="mname" id="mname">&nbsp;
        <label for="sname"> Surname :</label>
        <input type="text" name="sname" id="sname" required> <br><br>
        <label for="enroll"> Enrollment Date :</label>
        <input type="date" name="enroll" id="enroll" required> <br><br>
        <label for="dob"> Date of Birth :</label>
        <input type="date" name="dob" id="dob" required> <br><br>
        <label for="class"> class </label>
        <select name="class" id="class" required>
            <option value="">--Select Class--</option>
            <option value="1">Class 1</option>
            <option value="2">Class 2</option>
            <option value="3">Class 3</option>
            <option value="4">Class 4</option>
            <option value="5">Class 5</option>
            <option value="6">Class 6</option>
            <option value="7">Class 7</option>
            <option value="8">Class 8</option>
       </select><br><br>
        <label> Gender :</label><br><br>
        <input type="radio" name="gender" value="male" id="male" required>
        <label for="male">Male</label>
        <input type="radio" name="gender" value="female" id="female">
        <label for="female">Female</label>
        <br><br>
        <!-- <label for="residence">Home District</label>
        <select name="residence" id="residence" required>
            <option value="">--Select District--</option>
            <option>Balaka</option>
            <option>Blantyre</option>
            <option>Chikwawa</option>
            <option>Chiradzulu</option>
            <option>Chitipa</option>
            <option>Dedza</option>
            <option>Dowa</option>
            <option>Karonga</option>
            <option>Kasungu</option>
            <option>Likoma</option>
            <option>Lilongwe</option>
            <option>Machinga</option>
            <option>Mangochi</option>
            <option>Mchinji</option>
            <option>Mulanje</option>
            <option>Mwanza</option>
            <option>Mzimba</option>
            <option>Mzuzu</option>
            <option>Neno</option>
            <option>Nkhatabay</option>
            <option>Nkhotakota</option>
            <option>Nsanje</option>
            <option>Ntcheu</option>
            <option>Ntchisi</option>
            <option>Phalombe</option>
            <option>Rumphi</option>
            <option>Salima</option>
            <option>Thyolo</option>
            <option>Zomba</option>
        </select><br><br>  -->
        <label for="specialneeds"> Special Needs :</label><br>
        <textarea name="specialneeds" id="specialneeds" placeholder="if any" rows="3" cols="40" style="border-color: #66c2ff; border-radius: 12px;"></textarea><br><br>
        <label for="postaladdress" > postal address :</label><br>
        <textarea name="postaladdress" id="postaladdress" rows="3" cols="40" style="border-color: #66c2ff; border-radius: 12px;" required></textarea>
        <br><br>
        <button type="button" onclick="nextStep()">  Next <i class="fas fa-arrow-right"></i> 
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
        </button>
    </fieldset>
    <fieldset id="step2" style="display: none;">
      <legend> <b> guardian details</b> </legend>
        <label for="pfname"> First Name : </label>
        <input type="text" name="pfname" id="pfname" required> <br><br>

        <label for="psname"> Surname :</label>
        <input type="text" name="psname" id="psname" required> <br><br>
        <label> Relationship with the child :</label><br><br>
        <input type="radio" name="relationship" value="father" id="father" required>
        <label for="father">Father</label>
        <input type="radio" name="relationship" value="mother" id="mother">
        <label for="mother">Mother</label>
        <input type="radio" name="relationship" value="relative" id="relative">
        <label for="relative">Relative </label>  <br><br>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email"  required>
        <label for="phone">phone number :</label>
        <input type="tel" name="phone" id="phone"  required><br><br>
        
        <input type="submit" name="Registration" id="registration" style="border-radius: 10px;" value="REGISTER">
        <input type="reset" id="reset" style="border-radius: 10px;" value="CLEAR"><br><br>
        <button type="button" onclick="prevStep()">Back</button> 
    
    </fieldset><br>
  </form>
<script src="validate.js"></script>
  <script>

    function nextStep() {
        const step1 = document.getElementById("step1");
    
    const inputs = step1.querySelectorAll("input[required]");
    for (let input of inputs) {
        if (!input.value) {
            alert("Please fill in all required fields before proceeding.");
            return;
        }
    }
     
    const classValue = document.getElementById("class").value;

         if (!classValue) {
            alert("Please select a class.");
            return;
        }
     // checking if one of the districts was selected
    // const homedistrict= document.getElementById("residence").value;

    //      if (!homedistrict) {
    //         alert("Please select a dictrict.");
    //         return;
    //     }
    const postaladdress= document.getElementById("postaladdress").value;

         if (!postaladdress) {
            alert("Please enter postal address.");
            return;
         }
    // checking if one of the genders was selected 
    const gender = document.querySelector('input[name="gender"]:checked');

         if (!gender) {
            alert("Please select a gender.");
            return;
        }
    
    // If all fields are filled
        step1.style.display = "none";
        document.getElementById("step2").style.display = "block";
    }
    
    function prevStep() {
        document.getElementById("step1").style.display = "block";
        document.getElementById("step2").style.display = "none";
    }

    
function returntoteacher() {
    window.location.href = "../class_teacher/class_teacher.php";
}
</script>
</body>
</html>