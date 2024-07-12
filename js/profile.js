// script.js

function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('profileImg');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function updateProfile() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Simple validation (optional)
    if (!name || !email || !username || !password) {
        alert('Please fill in all fields.');
        return;
    }

    // Mock update (you would typically send this data to a server here)
    alert('Profile updated successfully!');
}
