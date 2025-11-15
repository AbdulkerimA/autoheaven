// Navbar scroll effect
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('glass-effect');
        navbar.style.backgroundColor = 'rgba(28, 37, 46, 0.9)';
    } else {
        navbar.classList.remove('glass-effect');
        navbar.style.backgroundColor = 'transparent';
    }
});

// Scroll reveal animation
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
        }
    });
}, observerOptions);

document.querySelectorAll('.scroll-reveal').forEach(el => {
    observer.observe(el);
});

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Search form functionality
// document.querySelector('form').addEventListener('submit', function(e) {
//     e.preventDefault();
//     const location = document.getElementById('location').value;
//     const pickupDate = document.getElementById('pickup-date').value;
//     const returnDate = document.getElementById('return-date').value;
    
//     if (location && pickupDate && returnDate) {
//         // Create custom modal instead of alert
//         const modal = document.createElement('div');
//         modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50';
//         modal.innerHTML = `
//             <div class="bg-primary p-8 rounded-2xl shadow-2xl max-w-md mx-4 glass-effect animate-bounce-in">
//                 <h3 class="text-2xl font-bold text-[#F5B800] mb-4">Search Results</h3>
//                 <p class="text-white mb-6">Searching for cars in ${location} from ${pickupDate} to ${returnDate}</p>
//                 <button onclick="this.parentElement.parentElement.remove()" class="bg-[#F5B800] text-primary font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition-all duration-300">
//                     Close
//                 </button>
//             </div>
//         `;
//         document.body.appendChild(modal);
//     } else {
//         const modal = document.createElement('div');
//         modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50';
//         modal.innerHTML = `
//             <div class="bg-primary p-8 rounded-2xl shadow-2xl max-w-md mx-4 glass-effect animate-bounce-in">
//                 <h3 class="text-2xl font-bold text-red-400 mb-4">Missing Information</h3>
//                 <p class="text-white mb-6">Please fill in all search fields</p>
//                 <button onclick="this.parentElement.parentElement.remove()" class="bg-[#F5B800] text-primary font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition-all duration-300">
//                     Close
//                 </button>
//             </div>
//         `;
//         document.body.appendChild(modal);
//     }
// });

// Book Now button functionality
document.querySelectorAll('button').forEach(button => {
    if (button.textContent.includes('Book Now')) {
        button.addEventListener('click', function() {
            const carName = this.closest('.card-hover').querySelector('h3').textContent;
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50';
            modal.innerHTML = `
                <div class="bg-primary p-8 rounded-2xl shadow-2xl max-w-md mx-4 glass-effect animate-bounce-in">
                    <h3 class="text-2xl font-bold text-[#F5B800] mb-4">Booking ${carName}</h3>
                    <p class="text-white mb-6">Redirecting to booking page...</p>
                    <button onclick="this.parentElement.parentElement.remove()" class="bg-[#F5B800] text-primary font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition-all duration-300">
                        Close
                    </button>
                </div>
            `;
            document.body.appendChild(modal);
        });
    }
});

// Other button functionality
document.querySelectorAll('button').forEach(button => {
    if (button.textContent.includes('Rent Now')) {
        button.addEventListener('click', function() {
            document.querySelector('#home').scrollIntoView({ behavior: 'smooth' });
        });
    }
    if (button.textContent.includes('Become an Owner')) {
        button.addEventListener('click', function() {
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50';
            modal.innerHTML = `
                <div class="bg-primary p-8 rounded-2xl shadow-2xl max-w-md mx-4 glass-effect animate-bounce-in">
                    <h3 class="text-2xl font-bold text-[#F5B800] mb-4">Become an Owner</h3>
                    <p class="text-white mb-6">Redirecting to car owner registration...</p>
                    <button onclick="this.parentElement.parentElement.remove()" class="bg-[#F5B800] text-primary font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition-all duration-300">
                        Close
                    </button>
                </div>
            `;
            document.body.appendChild(modal);
        });
    }
});

// Add parallax effect to hero background
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const parallax = document.querySelector('.parallax-bg');
    const speed = scrolled * 0.5;
    parallax.style.transform = `translateY(${speed}px)`;
});