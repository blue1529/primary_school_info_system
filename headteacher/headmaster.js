
//----------------------------------hide sidebar feature-----------------------------------
// Get elements
const toggleBtn = document.getElementById("toggle_btn");
const sidebar = document.getElementById("sidebar");
const mainContent = document.getElementById("main_content");

// Sidebar toggle functions
function hideSidebar() {
    sidebar.classList.add("hidden");
    toggleBtn.innerHTML = "☰";
}

function showSidebar() {
    sidebar.classList.remove("hidden");
    toggleBtn.innerHTML = "✕";
}

toggleBtn.addEventListener("click", () => {
    if (sidebar.classList.contains("hidden")) {
        showSidebar();
    } else {
        hideSidebar();
    }
});

// Initialize sidebar visible on load
window.addEventListener("load", () => {
    showSidebar();
});

// ---------------------------------------- Content button actiona---------------------------------

document.getElementById("dashboard").addEventListener("click", (e) => {
    e.preventDefault();
    hideSidebar();
    mainContent.innerHTML = `<img src="images/dashboard3.jpg" alt="image of a classroom" class="dashboard-img">`;
});

document.getElementById("std_grades").addEventListener("click", (e) => {
    e.preventDefault();
    hideSidebar();
    window.location.href = "student_grades.php?page=student_grades";
});

document.getElementById("classes") && document.getElementById("classes").addEventListener("click", (e) => {
    e.preventDefault();
    hideSidebar();
    mainContent.innerHTML = `<h3>CLASSES</h3>
    <div class="student_grades">
        <button class="grades">STANDARD 1</button>
        <button class="grades">STANDARD 2</button>
        <button class="grades">STANDARD 3</button>
        <button class="grades">STANDARD 4</button>
        <button class="grades">STANDARD 5</button>
        <button class="grades">STANDARD 6</button>
        <button class="grades">STANDARD 7</button>
        <button class="grades">STANDARD 8</button>
    </div>`;
});

document.getElementById("std_status") && document.getElementById("std_status").addEventListener("click", (e) => {
    e.preventDefault();
    hideSidebar();
    mainContent.innerHTML = `<h3>STUDENT STATUS</h3>
    <div class="student_grades">
        <button class="grades">STANDARD 1</button>
        <button class="grades">STANDARD 2</button>
        <button class="grades">STANDARD 3</button>
        <button class="grades">STANDARD 4</button>
        <button class="grades">STANDARD 5</button>
        <button class="grades">STANDARD 6</button>
        <button class="grades">STANDARD 7</button>
        <button class="grades">STANDARD 8</button>
    </div>`;
});

document.getElementById("std_details").addEventListener("click", (e) => {
    e.preventDefault();
    hideSidebar();
    mainContent.innerHTML = `<h3>STUDENT DETAILS</h3>
    <div class="student_grades">
        <button class="grades">STANDARD 1</button>
        <button class="grades">STANDARD 2</button>
        <button class="grades">STANDARD 3</button>
        <button class="grades">STANDARD 4</button>
        <button class="grades">STANDARD 5</button>
        <button class="grades">STANDARD 6</button>
        <button class="grades">STANDARD 7</button>
        <button class="grades">STANDARD 8</button>
    </div>`;
});

document.getElementById("teachers").addEventListener("click", (e) => {
    e.preventDefault();
    hideSidebar();
    mainContent.innerHTML = `<h3>TEACHERS</h3>
        <div class="teachers_buttons">
            <a href="../Teachers/teacher_registration/teacher_registration.php">
                <button class="t_btn" type="button">Register a Teacher</button>
            </a>
            <button class="t_btn">Assign Teacher</button>
        </div>`;
});

