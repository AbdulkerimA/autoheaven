// Filter functionality
function filterCars() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const categoryFilter = document.getElementById('categoryFilter').value;
    const brandFilter = document.getElementById('brandFilter').value;
    const priceFilter = document.getElementById('priceFilter').value;
    const fuelFilter = document.getElementById('fuelFilter').value;

    const carCards = document.querySelectorAll('.car-card');

    carCards.forEach(card => {
        const carName = card.querySelector('h3').textContent.toLowerCase();
        const category = card.getAttribute('data-category');
        const brand = card.getAttribute('data-brand');
        const price = parseInt(card.getAttribute('data-price'));
        const fuel = card.getAttribute('data-fuel');

        let matchesSearch = carName.includes(searchTerm);
        let matchesCategory = !categoryFilter || category === categoryFilter;
        let matchesBrand = !brandFilter || brand === brandFilter;
        let matchesFuel = !fuelFilter || fuel === fuelFilter;

        let matchesPrice = true;
        if (priceFilter) {
            if (priceFilter === '0-100') {
                matchesPrice = price >= 0 && price <= 100;
            } else if (priceFilter === '100-200') {
                matchesPrice = price > 100 && price <= 200;
            } else if (priceFilter === '200+') {
                matchesPrice = price > 200;
            }
        }

        if (matchesSearch && matchesCategory && matchesBrand && matchesPrice && matchesFuel) {
            card.style.display = 'block';
            card.style.animation = 'slideUp 0.4s ease-out';
        } else {
            card.style.display = 'none';
        }
    });

    // Add active class to filters
    document.querySelectorAll('.filter-select').forEach(select => {
        if (select.value) {
            select.classList.add('active');
        } else {
            select.classList.remove('active');
        }
    });
}

// Modal functionality
function showModal(title, content, action = null) {
    document.getElementById('modalTitle').textContent = title;
    document.getElementById('modalContent').innerHTML = content;
    document.getElementById('modal').classList.add('show');

    const actionButton = document.getElementById('modalAction');
    if (action) {
        actionButton.onclick = () => {
            action();
            closeModal();
        };
    } else {
        actionButton.onclick = closeModal;
    }
}

function closeModal() {
    document.getElementById('modal').classList.remove('show');
}

// Car management functions
function showAddCarModal() {
    const content = `
        <div style="display: grid; gap: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; color: var(--text-primary); font-weight: 600;">Car Name</label>
                <input type="text" placeholder="e.g., BMW X5" style="width: 100%; padding: 12px 16px; background: var(--glass-bg); border: 1px solid var(--glass-border); border-radius: 12px; color: var(--text-primary);">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; margin-bottom: 8px; color: var(--text-primary); font-weight: 600;">Brand</label>
                    <select style="width: 100%; padding: 12px 16px; background: var(--glass-bg); border: 1px solid var(--glass-border); border-radius: 12px; color: var(--text-primary);">
                        <option>BMW</option>
                        <option>Mercedes</option>
                        <option>Audi</option>
                        <option>Toyota</option>
                        <option>Porsche</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; margin-bottom: 8px; color: var(--text-primary); font-weight: 600;">Category</label>
                    <select style="width: 100%; padding: 12px 16px; background: var(--glass-bg); border: 1px solid var(--glass-border); border-radius: 12px; color: var(--text-primary);">
                        <option>SUV</option>
                        <option>Sedan</option>
                        <option>Hatchback</option>
                        <option>Sports</option>
                    </select>
                </div>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; margin-bottom: 8px; color: var(--text-primary); font-weight: 600;">Price per Day ($)</label>
                    <input type="number" placeholder="150" style="width: 100%; padding: 12px 16px; background: var(--glass-bg); border: 1px solid var(--glass-border); border-radius: 12px; color: var(--text-primary);">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 8px; color: var(--text-primary); font-weight: 600;">Fuel Type</label>
                    <select style="width: 100%; padding: 12px 16px; background: var(--glass-bg); border: 1px solid var(--glass-border); border-radius: 12px; color: var(--text-primary);">
                        <option>Petrol</option>
                        <option>Diesel</option>
                        <option>Hybrid</option>
                        <option>Electric</option>
                    </select>
                </div>
            </div>
        </div>
    `;
    showModal('Add New Car', content, () => {
        showModal('Success! ✨', '<p style="text-align: center; font-size: 18px;">Your new car has been added to your fleet successfully!</p>');
    });
}

function editCar(carName) {
    const content = `
        <p style="margin-bottom: 24px; font-size: 16px;">Edit details for <strong style="color: var(--accent-yellow);">${carName}</strong></p>
        <div style="display: grid; gap: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; color: var(--text-primary); font-weight: 600;">Price per Day ($)</label>
                <input type="number" value="150" style="width: 100%; padding: 12px 16px; background: var(--glass-bg); border: 1px solid var(--glass-border); border-radius: 12px; color: var(--text-primary);">
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; color: var(--text-primary); font-weight: 600;">Description</label>
                <textarea rows="3" placeholder="Car description..." style="width: 100%; padding: 12px 16px; background: var(--glass-bg); border: 1px solid var(--glass-border); border-radius: 12px; color: var(--text-primary); resize: vertical;"></textarea>
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; color: var(--text-primary); font-weight: 600;">Status</label>
                <select style="width: 100%; padding: 12px 16px; background: var(--glass-bg); border: 1px solid var(--glass-border); border-radius: 12px; color: var(--text-primary);">
                    <option>Available</option>
                    <option>Under Maintenance</option>
                    <option>Temporarily Unavailable</option>
                </select>
            </div>
        </div>
    `;
    showModal('Edit Car', content, () => {
        showModal('Updated! ✨', `<p style="text-align: center; font-size: 18px;"><strong style="color: var(--accent-yellow);">${carName}</strong> details have been updated successfully!</p>`);
    });
}

function viewBookings(carName) {
    const content = `
        <p style="margin-bottom: 24px; font-size: 16px;">Recent bookings for <strong style="color: var(--accent-yellow);">${carName}</strong></p>
        <div style="display: grid; gap: 16px;">
            <div style="padding: 20px; background: rgba(245, 184, 0, 0.1); border: 1px solid rgba(245, 184, 0, 0.2); border-radius: 16px;">
                <div style="display: flex; justify-between; align-items: center; margin-bottom: 8px;">
                    <span style="color: var(--text-primary); font-weight: 600; font-size: 16px;">John Smith</span>
                    <span style="color: var(--accent-yellow); font-weight: 700; font-size: 18px;">$450</span>
                </div>
                <div style="color: var(--text-secondary); font-size: 14px; margin-bottom: 4px;">Dec 15-18, 2024 • 3 days</div>
                <div style="color: var(--accent-yellow); font-size: 12px; text-transform: uppercase; font-weight: 600;">Completed</div>
            </div>
            <div style="padding: 20px; background: rgba(245, 184, 0, 0.1); border: 1px solid rgba(245, 184, 0, 0.2); border-radius: 16px;">
                <div style="display: flex; justify-between; align-items: center; margin-bottom: 8px;">
                    <span style="color: var(--text-primary); font-weight: 600; font-size: 16px;">Sarah Johnson</span>
                    <span style="color: var(--accent-yellow); font-weight: 700; font-size: 18px;">$300</span>
                </div>
                <div style="color: var(--text-secondary); font-size: 14px; margin-bottom: 4px;">Dec 10-12, 2024 • 2 days</div>
                <div style="color: var(--accent-yellow); font-size: 12px; text-transform: uppercase; font-weight: 600;">Completed</div>
            </div>
            <div style="padding: 20px; background: rgba(148, 163, 184, 0.1); border: 1px solid rgba(148, 163, 184, 0.2); border-radius: 16px;">
                <div style="display: flex; justify-between; align-items: center; margin-bottom: 8px;">
                    <span style="color: var(--text-primary); font-weight: 600; font-size: 16px;">Mike Wilson</span>
                    <span style="color: #94a3b8; font-weight: 700; font-size: 18px;">$600</span>
                </div>
                <div style="color: var(--text-secondary); font-size: 14px; margin-bottom: 4px;">Dec 20-24, 2024 • 4 days</div>
                <div style="color: #94a3b8; font-size: 12px; text-transform: uppercase; font-weight: 600;">Upcoming</div>
            </div>
        </div>
    `;
    showModal('Booking History', content);
}

function deleteCar(carName) {
    const content = `
        <div style="text-align: center;">
            <div style="width: 80px; height: 80px; background: rgba(239, 68, 68, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                <svg width="40" height="40" fill="#ef4444" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <p style="color: #ef4444; font-size: 18px; font-weight: 600; margin-bottom: 16px;">Delete <span style="color: var(--accent-yellow);">${carName}</span>?</p>
            <p style="color: var(--text-secondary); margin: 0; line-height: 1.6;">This action cannot be undone. All booking history and data for this car will be permanently removed from your fleet.</p>
        </div>
    `;
    showModal('Confirm Deletion', content, () => {
        showModal('Deleted! 🗑️', `<p style="text-align: center; font-size: 18px;"><strong style="color: var(--accent-yellow);">${carName}</strong> has been removed from your fleet.</p>`);
    });
}

// Close modal when clicking outside
document.getElementById('modal').addEventListener('click', function (e) {
    if (e.target === this) {
        closeModal();
    }
});

// Initialize page
document.addEventListener('DOMContentLoaded', function () {
    // Add staggered animation to cards
    const cards = document.querySelectorAll('.car-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${0.1 + (index * 0.1)}s`;
    });
});
