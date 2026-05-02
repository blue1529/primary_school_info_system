var editBtn = document.querySelector('.edit-btn');
var profileEditForm = document.getElementById('profileEditForm');

if (editBtn && profileEditForm) {
    editBtn.addEventListener('click', function () {
        profileEditForm.classList.remove('hidden');
        profileEditForm.hidden = false;
        editBtn.style.display = 'none';
    });
}