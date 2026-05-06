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

// Remove the problematic JavaScript handlers since we're using PHP links
// The page will refresh and load content properly via PHP