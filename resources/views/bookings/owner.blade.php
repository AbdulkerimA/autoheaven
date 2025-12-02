<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Rent Requests - Auto Heaven</title>
  @vite(['resources/css/manageRequest.css'])
 </head>
 <body>
  <x-header  class="bg-gray-900"/>
  <livewire:manage-rent-requests />
  <livewire:notification-widget />
  <!-- Modal -->
  <div class="modal-overlay" id="detailsModal">
   <div class="modal-content"><button class="modal-close" onclick="closeModal()">×</button>
    <div class="modal-header">
     <h2 class="modal-title" id="modalCarName">BMW X5 xDrive40i</h2>
     <p class="modal-subtitle">Booking Details</p>
    </div>
    <div class="modal-section">
     <h3 class="section-title">Customer Information</h3>
     <div class="detail-row"><span class="detail-label">Name</span> <span class="detail-value" id="modalCustomerName">John Smith</span>
     </div>
     <div class="detail-row"><span class="detail-label">Email</span> <span class="detail-value" id="modalCustomerEmail">john.smith@email.com</span>
     </div>
     <div class="detail-row"><span class="detail-label">Phone</span> <span class="detail-value" id="modalCustomerPhone">+1 (555) 123-4567</span>
     </div>
     <div class="detail-row"><span class="detail-label">License Number</span> <span class="detail-value" id="modalLicense">DL-2839475</span>
     </div>
    </div>
    <div class="modal-section">
     <h3 class="section-title">Booking Information</h3>
     <div class="detail-row"><span class="detail-label">Booking ID</span> <span class="detail-value" id="modalBookingId">BK-2024-001</span>
     </div>
     <div class="detail-row"><span class="detail-label">Pickup Date</span> <span class="detail-value" id="modalPickupDate">Dec 15, 2024</span>
     </div>
     <div class="detail-row"><span class="detail-label">Return Date</span> <span class="detail-value" id="modalReturnDate">Dec 20, 2024</span>
     </div>
     <div class="detail-row"><span class="detail-label">Duration</span> <span class="detail-value" id="modalDuration">5 Days</span>
     </div>
     <div class="detail-row"><span class="detail-label">Total Amount</span> <span class="detail-value" id="modalAmount">$750</span>
     </div>
    </div>
    <div class="modal-section">
     <h3 class="section-title">Status</h3>
     <div class="detail-row"><span class="detail-label">Booking Status</span> <span class="detail-value"><span class="status-badge status-pending" id="modalStatus">Pending</span></span>
     </div>
     <div class="detail-row"><span class="detail-label">Payment Status</span> <span class="detail-value"><span class="status-badge payment-pending" id="modalPayment">Pending</span></span>
     </div>
    </div>
    <div class="modal-actions"><button class="action-btn btn-accept" onclick="acceptBooking()">Accept Booking</button> <button class="action-btn btn-reject" onclick="rejectBooking()">Reject Booking</button>
    </div>
   </div>
  </div>
  <x-footer />

{{-- <script>
        // Sample data
        const requestsData = [
            {
                id: 1,
                bookingId: 'BK-2024-001',
                customer: { name: 'John Smith', email: 'john.smith@email.com', phone: '+1 (555) 123-4567', license: 'DL-2839475' },
                car: { name: 'BMW X5 xDrive40i', image: 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"%3E%3Crect fill="%23111827" width="400" height="300"/%3E%3Cpath fill="%23FACC15" d="M50 150 L100 120 L300 120 L350 150 L320 180 L280 180 L260 200 L140 200 L120 180 L80 180 Z"/%3E%3Ccircle fill="%23374151" cx="130" cy="200" r="30"/%3E%3Ccircle fill="%23111827" cx="130" cy="200" r="15"/%3E%3Ccircle fill="%23374151" cx="270" cy="200" r="30"/%3E%3Ccircle fill="%23111827" cx="270" cy="200" r="15"/%3E%3Cpath fill="%2331415566" d="M110 130 L150 130 L160 150 L120 150 Z"/%3E%3Cpath fill="%2331415566" d="M180 130 L240 130 L250 150 L190 150 Z"/%3E%3C/svg%3E' },
                pickupDate: 'Dec 15, 2024',
                returnDate: 'Dec 20, 2024',
                duration: '5 Days',
                totalPrice: 750,
                status: 'pending',
                paymentStatus: 'pending'
            },
            {
                id: 2,
                bookingId: 'BK-2024-002',
                customer: { name: 'Sarah Johnson', email: 'sarah.j@email.com', phone: '+1 (555) 234-5678', license: 'DL-8473829' },
                car: { name: 'Mercedes-Benz GLE 450', image: 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"%3E%3Crect fill="%23111827" width="400" height="300"/%3E%3Cpath fill="%23374151" d="M50 150 L100 110 L300 110 L350 150 L320 180 L280 180 L260 200 L140 200 L120 180 L80 180 Z"/%3E%3Ccircle fill="%23FACC15" cx="130" cy="200" r="30"/%3E%3Ccircle fill="%23111827" cx="130" cy="200" r="15"/%3E%3Ccircle fill="%23FACC15" cx="270" cy="200" r="30"/%3E%3Ccircle fill="%23111827" cx="270" cy="200" r="15"/%3E%3Cpath fill="%2331415599" d="M110 120 L150 120 L160 145 L120 145 Z"/%3E%3Cpath fill="%2331415599" d="M180 120 L250 120 L260 145 L190 145 Z"/%3E%3C/svg%3E' },
                pickupDate: 'Dec 18, 2024',
                returnDate: 'Dec 25, 2024',
                duration: '7 Days',
                totalPrice: 1120,
                status: 'confirmed',
                paymentStatus: 'paid'
            },
            {
                id: 3,
                bookingId: 'BK-2024-003',
                customer: { name: 'Michael Chen', email: 'mchen@email.com', phone: '+1 (555) 345-6789', license: 'DL-5729384' },
                car: { name: 'Audi Q7 Premium Plus', image: 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"%3E%3Crect fill="%23111827" width="400" height="300"/%3E%3Cpath fill="%23F59E0B" d="M50 150 L100 115 L300 115 L350 150 L320 185 L280 185 L260 205 L140 205 L120 185 L80 185 Z"/%3E%3Ccircle fill="%23374151" cx="130" cy="205" r="30"/%3E%3Ccircle fill="%23FACC15" cx="130" cy="205" r="15"/%3E%3Ccircle fill="%23374151" cx="270" cy="205" r="30"/%3E%3Ccircle fill="%23FACC15" cx="270" cy="205" r="15"/%3E%3Cpath fill="%2331415577" d="M110 125 L150 125 L160 148 L120 148 Z"/%3E%3Cpath fill="%2331415577" d="M180 125 L245 125 L255 148 L190 148 Z"/%3E%3C/svg%3E' },
                pickupDate: 'Dec 12, 2024',
                returnDate: 'Dec 16, 2024',
                duration: '4 Days',
                totalPrice: 680,
                status: 'pending',
                paymentStatus: 'pending'
            },
            {
                id: 4,
                bookingId: 'BK-2024-004',
                customer: { name: 'Emily Davis', email: 'emily.davis@email.com', phone: '+1 (555) 456-7890', license: 'DL-9384756' },
                car: { name: 'Porsche Cayenne S', image: 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"%3E%3Crect fill="%23111827" width="400" height="300"/%3E%3Cpath fill="%23EF4444" d="M50 155 L95 125 L305 125 L350 155 L325 180 L285 180 L265 200 L135 200 L115 180 L75 180 Z"/%3E%3Ccircle fill="%23374151" cx="130" cy="200" r="28"/%3E%3Ccircle fill="%23111827" cx="130" cy="200" r="14"/%3E%3Ccircle fill="%23374151" cx="270" cy="200" r="28"/%3E%3Ccircle fill="%23111827" cx="270" cy="200" r="14"/%3E%3Cpath fill="%2331415588" d="M105 135 L145 135 L155 152 L115 152 Z"/%3E%3Cpath fill="%2331415588" d="M175 135 L245 135 L255 152 L185 152 Z"/%3E%3C/svg%3E' },
                pickupDate: 'Dec 10, 2024',
                returnDate: 'Dec 14, 2024',
                duration: '4 Days',
                totalPrice: 920,
                status: 'confirmed',
                paymentStatus: 'paid'
            },
            {
                id: 5,
                bookingId: 'BK-2024-005',
                customer: { name: 'David Martinez', email: 'dmartinez@email.com', phone: '+1 (555) 567-8901', license: 'DL-4756283' },
                car: { name: 'Tesla Model X Long Range', image: 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"%3E%3Crect fill="%23111827" width="400" height="300"/%3E%3Cpath fill="%2310B981" d="M50 155 L100 120 L300 120 L350 155 L320 185 L280 185 L260 202 L140 202 L120 185 L80 185 Z"/%3E%3Cellipse fill="%23374151" cx="130" cy="202" rx="30" ry="28"/%3E%3Cellipse fill="%23FACC15" cx="130" cy="202" rx="16" ry="14"/%3E%3Cellipse fill="%23374151" cx="270" cy="202" rx="30" ry="28"/%3E%3Cellipse fill="%23FACC15" cx="270" cy="202" rx="16" ry="14"/%3E%3Cpath fill="%2331415599" d="M110 130 L155 130 L162 150 L118 150 Z"/%3E%3Cpath fill="%2331415599" d="M180 130 L250 130 L257 150 L188 150 Z"/%3E%3C/svg%3E' },
                pickupDate: 'Dec 22, 2024',
                returnDate: 'Dec 29, 2024',
                duration: '7 Days',
                totalPrice: 1330,
                status: 'pending',
                paymentStatus: 'pending'
            }
        ];
        
        let filteredRequests = [...requestsData];
        let currentModalRequest = null;
        
        // Initialize
        function init() {
            renderRequests();
            updateStats();
        }
        
        // Render requests
        function renderRequests() {
            const container = document.getElementById('requestsList');
            container.innerHTML = '';
            
            filteredRequests.forEach((request, index) => {
                const card = createRequestCard(request, index);
                container.appendChild(card);
            });
        }
        
        // Create request card
        function createRequestCard(request, index) {
            const card = document.createElement('div');
            card.className = 'request-card';
            card.style.animationDelay = `${index * 0.1}s`;
            
            const statusClass = `status-${request.status}`;
            const paymentClass = request.paymentStatus === 'paid' ? 'payment-paid' : 'payment-pending';
            
            const initials = request.customer.name.split(' ').map(n => n[0]).join('');
            
            card.innerHTML = `
                <div class="request-content">
                    <div class="car-image-wrapper">
                        <img src="${request.car.image}" alt="${request.car.name}" class="car-image">
                    </div>
                    
                    <div class="request-details">
                        <div class="customer-info">
                            <div class="customer-avatar">${initials}</div>
                            <div class="customer-details">
                                <h3>${request.customer.name}</h3>
                                <div class="customer-email">${request.customer.email}</div>
                            </div>
                        </div>
                        
                        <div class="car-name">${request.car.name}</div>
                        
                        <div class="booking-info">
                            <div class="info-item">
                                <span class="info-icon">📅</span>
                                <span class="info-value">${request.pickupDate} - ${request.returnDate}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-icon">⏱️</span>
                                <span class="info-value">${request.duration}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-icon">💰</span>
                                <span class="info-value">$${request.totalPrice}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-icon">🆔</span>
                                <span class="info-value">${request.bookingId}</span>
                            </div>
                        </div>
                        
                        <div class="status-badges">
                            <span class="status-badge ${statusClass}">${request.status}</span>
                            <span class="status-badge ${paymentClass}">${request.paymentStatus}</span>
                        </div>
                    </div>
                    
                    <div class="request-actions">
                        ${request.status === 'pending' ? `
                            <button class="action-btn btn-accept" onclick="acceptRequest(${request.id})">Accept</button>
                            <button class="action-btn btn-reject" onclick="rejectRequest(${request.id})">Reject</button>
                        ` : ''}
                        <button class="action-btn btn-details" onclick="viewDetails(${request.id})">View Details</button>
                    </div>
                </div>
            `;
            
            return card;
        }
        
        // Update stats
        function updateStats() {
            const total = filteredRequests.length;
            const pending = filteredRequests.filter(r => r.status === 'pending').length;
            const confirmed = filteredRequests.filter(r => r.status === 'confirmed').length;
            
            document.getElementById('totalRequests').textContent = total;
            document.getElementById('pendingRequests').textContent = pending;
            document.getElementById('confirmedRequests').textContent = confirmed;
        }
        
        // Filter requests
        function filterRequests() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const dateFilter = document.getElementById('dateFilter').value;
            
            filteredRequests = requestsData.filter(request => {
                const matchesSearch = 
                    request.customer.name.toLowerCase().includes(searchTerm) ||
                    request.car.name.toLowerCase().includes(searchTerm) ||
                    request.bookingId.toLowerCase().includes(searchTerm);
                
                const matchesStatus = statusFilter === 'all' || request.status === statusFilter;
                
                return matchesSearch && matchesStatus;
            });
            
            renderRequests();
            updateStats();
        }
        
        // View details
        function viewDetails(id) {
            const request = requestsData.find(r => r.id === id);
            if (!request) return;
            
            currentModalRequest = request;
            
            document.getElementById('modalCarName').textContent = request.car.name;
            document.getElementById('modalCustomerName').textContent = request.customer.name;
            document.getElementById('modalCustomerEmail').textContent = request.customer.email;
            document.getElementById('modalCustomerPhone').textContent = request.customer.phone;
            document.getElementById('modalLicense').textContent = request.customer.license;
            document.getElementById('modalBookingId').textContent = request.bookingId;
            document.getElementById('modalPickupDate').textContent = request.pickupDate;
            document.getElementById('modalReturnDate').textContent = request.returnDate;
            document.getElementById('modalDuration').textContent = request.duration;
            document.getElementById('modalAmount').textContent = `$${request.totalPrice}`;
            
            const statusBadge = document.getElementById('modalStatus');
            statusBadge.className = `status-badge status-${request.status}`;
            statusBadge.textContent = request.status;
            
            const paymentBadge = document.getElementById('modalPayment');
            paymentBadge.className = `status-badge ${request.paymentStatus === 'paid' ? 'payment-paid' : 'payment-pending'}`;
            paymentBadge.textContent = request.paymentStatus;
            
            document.getElementById('detailsModal').classList.add('active');
        }
        
        // Close modal
        function closeModal() {
            document.getElementById('detailsModal').classList.remove('active');
            currentModalRequest = null;
        }
        
        // Accept request
        function acceptRequest(id) {
            const index = requestsData.findIndex(r => r.id === id);
            if (index !== -1) {
                requestsData[index].status = 'confirmed';
                filterRequests();
                showToast('Booking request accepted successfully!', 'success');
            }
        }
        
        // Reject request
        function rejectRequest(id) {
            const index = requestsData.findIndex(r => r.id === id);
            if (index !== -1) {
                requestsData[index].status = 'cancelled';
                filterRequests();
                showToast('Booking request rejected', 'error');
            }
        }
        
        // Accept from modal
        function acceptBooking() {
            if (currentModalRequest) {
                acceptRequest(currentModalRequest.id);
                closeModal();
            }
        }
        
        // Reject from modal
        function rejectBooking() {
            if (currentModalRequest) {
                rejectRequest(currentModalRequest.id);
                closeModal();
            }
        }
        
        // Show toast notification
        function showToast(message, type) {
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.innerHTML = `
                <div class="toast-icon">${type === 'success' ? '✓' : '✕'}</div>
                <span>${message}</span>
            `;
            
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.animation = 'slideInRight 0.4s ease-out reverse';
                setTimeout(() => toast.remove(), 400);
            }, 3000);
        }
        
        // Close modal on overlay click
        document.getElementById('detailsModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
        
        // Initialize on load
        init();
</script> --}}

</html>