<div class="page-container mt-12">
    <!-- Header -->
    <header class="header mt-12 w-full flex flex-col items-center">
        <h1 class="header-title">Manage Rent Requests</h1>
        <p class="header-subtitle">Review and manage all rental requests for your vehicles</p>
    </header>

                <!-- Search and Filter -->
            <div class="search-filter-bar">
                <div class="search-row">
                    <div class="search-input-wrapper">
                <input 
                    type="text"
                    class="search-input"
                    placeholder="Search by customer, car name, or booking ID..."
                    wire:model.live.debounce.300ms="search"
                >
            </div>

            <select class="filter-select" wire:model.live="statusFilter">
                <option value="all">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
                <option value="completed">Completed</option>
            </select>
            <select class="filter-select" wire:model="dateFilter">
                <option value="all">All Dates</option>
                <option value="today">Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
            </select>
        </div>
    </div>

    <!-- Requests List -->
    <div class="requests-container">
        <div class="requests-header">
            <h2 class="requests-title">Rental Requests</h2>
        </div>

        @forelse($filteredRequests as $request)
        {{-- {{ dd($request['car']['media'][0]['file_path']) }} --}}
            <div class="request-card">
                <div class="request-content">
                    <div class="car-image-wrapper">
                        <img src="{{ asset('storage/'.$request->car->media->first()->file_path )}}" 
                             alt="{{ $request['car']['name'] }}" class="car-image">
                    </div>

                    <div class="request-details">
                        <div class="customer-info">
                            <div class="customer-avatar">
                                {{-- {{ collect(explode(' ', $request['customer']['name']))->map(fn($n) => $n[0])->join('') }} --}}
                                <img src="{{ asset('storage/'.$request->customer->profile->profile_picture) }}" 
                                     alt=""
                                     class="w-full h-full rounded-full object-cover"
                                     >
                            </div>
                            <div class="customer-details">
                                <h3>{{ $request['customer']['name'] }}</h3>
                                <div class="customer-email">{{ $request['customer']['email'] }}</div>
                            </div>
                        </div>

                        <div class="car-name">{{ $request['car']['name'] }}</div>

                        <div class="booking-info">
                            <div class="info-item"><span>📅</span> 
                                <span>
                                    {{ date('d M ,Y',strtotime($request['start_date'])) }} 
                                    - {{  date('d M ,Y',strtotime($request['end_date'])) }}
                                </span>
                            </div>
                            <div class="info-item"><span>💰</span> <span>{{ number_format($request['total_price'])}}ETB</span></div>
                            <div class="info-item"><span>🆔</span> <span>{{ $request['id'] }}</span></div>
                        </div>

                        <div class="status-badges">
                            <span class="status-badge status-{{ $request['status'] }}">{{ $request['status'] }}</span>
                            <span class="status-badge {{ $request['payment_status'] === 'paid' ? 'payment-paid' : 'payment-pending' }}">{{ $request['payment_status'] }}</span>
                        </div>
                    </div>

                    <div class="request-actions">
                        @if($request['status'] === 'pending')
                            <button class="action-btn btn-accept" wire:click="acceptRequest({{ $request['id'] }})">Accept</button>
                            <button class="action-btn btn-reject" wire:click="rejectRequest({{ $request['id'] }})">Reject</button>
                        @endif
                        <button class="action-btn btn-details" wire:click="viewDetails({{ $request['id'] }})">View Details</button>
                        @if ($request->status == 'confirmed')
                            <button class="action-btn btn-accept capitalize" 
                                wire:click="completed({{ $request['id'] }})">car returned</button>
                        @endif
                        {{-- delete --}}
                        @if ($request->status == 'cancelled')
                            <button class="action-btn btn-reject capitalize" 
                                wire:click="remove({{ $request['id'] }})">remove</button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-300 w-full bg-gray-800 rounded-xl py-24 flex justify-center font-bold text-2xl">
                No requests found.
            </p>
        @endforelse
    </div>

    <!-- Modal -->
    @if($currentRequest)
        <div class="modal-overlay active">
            <div class="modal-content">
                <button class="modal-close" wire:click="closeModal">×</button>
                <h2 class="modal-title">{{ $currentRequest['car']['name'] }}</h2>
                <p class="modal-subtitle">Booking Details</p>

                <div class="modal-section">
                    <h3 class="section-title">Customer Information</h3>
                    <div class="detail-row"><span>Name</span> <span>{{ $currentRequest['customer']['name'] }}</span></div>
                    <div class="detail-row"><span>Email</span> <span>{{ $currentRequest['customer']['email'] }}</span></div>
                    <div class="detail-row"><span>Phone</span> <span>{{ $currentRequest['customer']['profile']['phone'] }}</span></div>
                    <div class="detail-row"><span>License Number</span> <span>{{ $currentRequest['customer']['profile']['license_number'] }}</span></div>
                </div>

                <div class="modal-section">
                    <h3 class="section-title">Booking Information</h3>
                    <div class="detail-row"><span>Booking ID</span> <span>{{ $currentRequest['id'] }}</span></div>
                    <div class="detail-row"><span>Pickup Date</span> <span>{{ $currentRequest['start_date'] }}</span></div>
                    <div class="detail-row"><span>Return Date</span> <span>{{ $currentRequest['end_date'] }}</span></div>
                    <div class="detail-row"><span>Duration</span> <span>{{ $currentRequest['duration'] }}</span></div>
                    <div class="detail-row"><span>Total Amount</span> <span>${{ $currentRequest['total_price'] }}</span></div>
                </div>

                <div class="modal-section">
                    <h3 class="section-title">Status</h3>
                    <div class="detail-row"><span>Booking Status</span> <span class="status-badge status-{{ $currentRequest['status'] }}">{{ $currentRequest['status'] }}</span></div>
                    <div class="detail-row"><span>Payment Status</span> <span class="status-badge {{ $currentRequest['payment_status'] === 'paid' ? 'payment-paid' : 'payment-pending' }}">
                        {{ $currentRequest['payment_status'] }}
                    </span></div>
                </div>

                <div class="modal-actions">
                    @if($currentRequest['status'] === 'pending')
                        <button class="action-btn btn-accept" wire:click="acceptRequest({{ $currentRequest['id'] }})">Accept Booking</button>
                        <button class="action-btn btn-reject" wire:click="rejectRequest({{ $currentRequest['id'] }})">Reject Booking</button>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
