let teacher_btn=document.getElementById("teachers");
let maincontent=document.getElementById("main_content");

let std_grades=document.getElementById("std_grades");
std_grades.addEventListener("click", (e) =>{
    e.preventDefault();
    maincontent.innerHTML=` <h3> STUDENT GRADES </h3>
        <div class="student_grades">
            <button class="grades">STANDARD 1</button>
            <button class="grades">STANDARD 2</button>
            <button class="grades">STANDARD 3</button>
            <button class="grades">STANDARD 4</button>
            <button class="grades">STANDARD 5</button>
            <button class="grades">STANDARD 6</button>
            <button class="grades">STANDARD 7</button>
            <button class="grades">STANDARD 8</button>
        </div>
    `;
})

let classes=document.getElementById("classes");
classes.addEventListener("click", (e) =>{
    e.preventDefault();
    maincontent.innerHTML=` <h3> CLASSES </h3>
    <div class="student_grades">
            <button class="grades">STANDARD 1</button>
            <button class="grades">STANDARD 2</button>
            <button class="grades">STANDARD 3</button>
            <button class="grades">STANDARD 4</button>
            <button class="grades">STANDARD 5</button>
            <button class="grades">STANDARD 6</button>
            <button class="grades">STANDARD 7</button>
            <button class="grades">STANDARD 8</button>
        </div>
    `;
})
let std_status=document.getElementById("std_status");
std_status.addEventListener("click", (e) =>{
    e.preventDefault();
    maincontent.innerHTML=` <h3> STUDENT DETAILS </h3>
    <div class="student_grades">
            <button class="grades">STANDARD 1</button>
            <button class="grades">STANDARD 2</button>
            <button class="grades">STANDARD 3</button>
            <button class="grades">STANDARD 4</button>
            <button class="grades">STANDARD 5</button>
            <button class="grades">STANDARD 6</button>
            <button class="grades">STANDARD 7</button>
            <button class="grades">STANDARD 8</button>
        </div>
    `;
})
let std_details=document.getElementById("std_details");
std_details.addEventListener("click", (e) =>{
    e.preventDefault();
    maincontent.innerHTML=` <h3> STUDENT DETAILS </h3>
    <div class="student_grades">
            <button class="grades">STANDARD 1</button>
            <button class="grades">STANDARD 2</button>
            <button class="grades">STANDARD 3</button>
            <button class="grades">STANDARD 4</button>
            <button class="grades">STANDARD 5</button>
            <button class="grades">STANDARD 6</button>
            <button class="grades">STANDARD 7</button>
            <button class="grades">STANDARD 8</button>
        </div>
    `;
})


// Dashboard button handler
let dashboard_btn = document.getElementById("dashboard");
dashboard_btn.addEventListener("click", (e) => {
    e.preventDefault();
    maincontent.innerHTML = `<img src="images/dashboard3.jpg" alt="image of a classroom" class="dashboard-img">`;
});

// // Function to load teacher registration form
// function loadTeacherRegistration() {
//     fetch("../Teachers/teacher_registration/teacher_registration.php")
//         .then(response => response.text())
//         .then(data => {
//             maincontent.innerHTML = data;
//         })
//         .catch(error => console.error("Error loading registration form:", error));
// }

// // Add event listeners to dynamically created buttons
// function attachTeacherButtonListeners() {
//     let registerBtn = maincontent.querySelector(".teachers_buttons .t_btn:nth-child(1)");
//     let assignBtn = maincontent.querySelector(".teachers_buttons .t_btn:nth-child(2)");
    
//     if (registerBtn) {
//         registerBtn.addEventListener("click", () => {
//             loadTeacherRegistration();
//         });
//     }
    
//     if (assignBtn) {
//         assignBtn.addEventListener("click", () => {
//             maincontent.innerHTML = `<h3>ASSIGN TEACHER</h3><p>Assign teacher functionality coming soon...</p>`;
//         });
//     }
// }

// // Teacher button click handler
// teacher_btn.addEventListener("click", (e) => {
//     e.preventDefault();
//     maincontent.innerHTML = ` <h3> TEACHERS </h3>
//         <div class="teachers_buttons"> 
//                 <button class="t_btn">Register a Teacher</button>
//                 <button class="t_btn">Assign Teacher</button>
    
//         </div>`;
//     // Attach listeners after buttons are created
//     attachTeacherButtonListeners();
// });

let sideButtons = document.querySelectorAll(".side_btn");

sideButtons.forEach(button => {
    button.addEventListener("click", () => {
        // Remove active color from all buttons
        sideButtons.forEach(btn => btn.classList.remove("active"));

        // Add active color to clicked button
        button.classList.add("active");
    });
});

// Teachers button click handler
teacher_btn.addEventListener("click", (e) =>{
    e.preventDefault();
    maincontent.innerHTML=` <h3> TEACHERS </h3>
        <div class="teachers_buttons"> 
                <a href="../Teachers/teacher_registration/teacher_registration.php"><button class="t_btn" type="button">Register a Teacher</button></a>
                <button class="t_btn">Assign Teacher</button>
    
        </div>`;
});
