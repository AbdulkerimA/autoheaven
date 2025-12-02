const profileBtn = document.getElementById('profileBtn');
const profileDropdown = document.getElementById('profileDropdown'); 

// console.log(profileBtn);
console.log(profileDropdown.classList);

profileBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    profileDropdown.classList.toggle('hidden'); 
    console.log(profileDropdown.classList);
});

// Close dropdowns when clicking outside
document.addEventListener('click', () => {
    profileDropdown.classList.add('hidden');
});