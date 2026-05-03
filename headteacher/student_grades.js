//================For collapsible sidebar function==========================================
const toggleBtn = document.getElementById("toggle_btn");
const sidebar = document.getElementById("sidebar");

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

document.querySelectorAll(".side_btn").forEach(btn => {
    btn.addEventListener("click", () => {
        hideSidebar();
    });
});

//side bar hidden on load
window.addEventListener("load", () => {
    hideSidebar();
});
