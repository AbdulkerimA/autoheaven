// Custom modal function
function showModal(title, message) {
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50 animate-fade-in';
    modal.innerHTML = `
        <div class="p-8 rounded-xl shadow-2xl max-w-md mx-4 animate-scale-in border" style="background: var(--color-primary); border-color: rgba(250, 204, 21, 0.2);">
            <h3 class="text-2xl font-bold mb-4" style="color: var(--color-accent); font-family: Poppins, system-ui, sans-serif;">${title}</h3>
            <p class="mb-6 leading-relaxed" style="color: var(--color-gray); font-family: Inter, system-ui, sans-serif;">${message}</p>
            <button onclick="this.parentElement.parentElement.remove()" class="btn-primary font-bold px-6 py-3 rounded-xl transition-all duration-300" style="font-family: Poppins, system-ui, sans-serif;">
                Close
            </button>
        </div>
    `;
    document.body.appendChild(modal);
}

// Profile dropdown functionality
document.getElementById('profileDropdown').addEventListener('click', function () {
    const dropdown = document.getElementById('dropdownMenu');
    dropdown.classList.toggle('hidden');
});

// Close dropdown when clicking outside
document.addEventListener('click', function (e) {
    const dropdown = document.getElementById('dropdownMenu');
    const button = document.getElementById('profileDropdown');
    if (!button.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.classList.add('hidden');
    }
});

// Profile photo upload
const photoUploadBtn = document.getElementById('photoUploadBtn');
const photoInput = document.getElementById('photoInput');
const profileImage = document.getElementById('profileImage');

photoUploadBtn.addEventListener('click', () => {
    photoInput.click();
});

photoInput.addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                profileImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
            showModal('Photo Updated', 'Your profile photo has been updated successfully!');
        } else {
            showModal('Invalid File', 'Please select a valid image file.');
        }
    }
});

// Toggle switches functionality
document.querySelectorAll('.toggle-switch').forEach(toggle => {
    toggle.addEventListener('click', function () {
        this.classList.toggle('active');
        const toggleType = this.getAttribute('data-toggle');
        const isActive = this.classList.contains('active');

        let message = '';
        switch (toggleType) {
            case 'email':
                message = isActive ? 'Email notifications enabled' : 'Email notifications disabled';
                break;
            case 'sms':
                message = isActive ? 'SMS notifications enabled' : 'SMS notifications disabled';
                break;
            case '2fa':
                message = isActive ? 'Two-factor authentication enabled' : 'Two-factor authentication disabled';
                break;
        }

        showModal('Settings Updated', message);
    });
});

// Edit profile button
document.getElementById('editProfileBtn').addEventListener('click', function () {
    showModal('Edit Profile', 'Profile editing form would open here. This feature allows you to update your personal information.');
});

// Edit details button
document.querySelector('.btn-secondary').addEventListener('click', function () {
    showModal('Edit Details', 'Personal information editing form would open here.');
});

// Change password button
document.querySelector('button:contains("Change Password")').addEventListener('click', function () {
    showModal('Change Password', 'Password change form would open here with current password verification.');
});

// Navigation links
document.querySelectorAll('nav a, footer a').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        const linkText = this.textContent;
        showModal('Navigation', `Redirecting to ${linkText} page...`);
    });
});

// Activity items hover effect
document.querySelectorAll('.activity-item').forEach(item => {
    item.addEventListener('click', function () {
        const carName = this.querySelector('h4').textContent;
        showModal('Booking Details', `Viewing details for ${carName} booking...`);
    });
});