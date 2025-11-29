<style>
    .star-rating {
      color: #FACC15;
    }

    .star-empty {
      color: #374151;
    }

    .availability-badge {
      position: absolute;
      top: 12px;
      right: 12px;
      z-index: 10;
    }

    .price-highlight {
      color: #FACC15;
      font-weight: 700;
      font-size: 1.5rem;
    }
    .card-hover {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      border: 1px solid transparent;
    }

    .card-hover:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(250, 204, 21, 0.3);
      border-color: rgba(250, 204, 21, 0.5);
    }

    .card-hover:hover img {
      transform: scale(1.05);
    }

    .card-hover img {
      transition: transform 0.4s ease;
    }

    .btn-gold {
      background: #FACC15;
      color: #111827;
      transition: all 0.3s ease;
      font-weight: 600;
    }

    .btn-gold:hover {
      box-shadow: 0 0 25px rgba(250, 204, 21, 0.6);
      transform: scale(1.02);
    }

    .btn-outline-gold {
      border: 2px solid #FACC15;
      color: #FACC15;
      background: transparent;
      transition: all 0.3s ease;
      font-weight: 600;
    }

    .btn-outline-gold:hover {
      background: #FACC15;
      color: #111827;
      box-shadow: 0 0 20px rgba(250, 204, 21, 0.4);
    }                                                                                                                                                           
</style>
<div class="card-hover bg-gray-800 rounded-2xl overflow-hidden shadow-lg fade-in-up relative">

    <!-- Availability Badge -->
    <div class="availability-badge absolute top-3 left-3">
        <span class="px-3 py-1 rounded-full text-xs font-semibold 
            {{ $car['availability_status'] == 'available' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
            {{ $car['availability_status'] == 'available' ? 'Available' : $car->availability_status }}
        </span>
    </div>

    <!-- Car Image -->
    <div class="overflow-hidden">
        {{-- @dump($car->media->first()?->file_path) --}}
        <img src="{{ asset('storage/'.$car->media->first()?->file_path) ?? 'https://images.pexels.com/photos/358070/pexels-photo-358070.jpeg' }}" 
             alt="{{ $car->title }}"
             class="w-full h-48 object-cover">
    </div>

    <div class="p-6">

        <!-- Title + Category -->
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="text-xl font-bold text-white mb-1">{{ Str::limit($car['name'],11) }}</h3>
                <p class="text-yellow-400 text-sm font-semibold">{{ strtoupper($car['brand']) }}</p>
            </div>
            <span class="text-xs px-2 py-1 rounded-full bg-gray-700 text-gray-300">
                {{ strtoupper($car['category']) }}
            </span>
        </div>

        <!-- Info Rows -->
        <div class="space-y-2 grid grid-cols-2 ">

            <div class="info-row flex items-center text-gray-300 space-x-2">
                {{-- <x-icons.category class="w-4 h-4" /> --}}
                <span>{{ $car['category'] }}</span>
            </div>

            <div class="info-row flex items-center text-gray-300 space-x-2">
                {{-- <x-icons.transmission class="w-4 h-4" /> --}}
                <span>{{ $car['transmission'] }}</span>
            </div>

            {{-- <div class="info-row flex items-center text-gray-300 space-x-2">
                <x-icons.fuel class="w-4 h-4" />
                <span>{{ $car['fuel'] }}</span>
            </div> --}}

            <div class="info-row flex items-center text-gray-300 space-x-2">
                {{-- <x-icons.calendar class="w-4 h-4" /> --}}
                <span>{{ $car['year'] }}</span>
            </div>

            <div class="info-row flex items-center text-gray-300 space-x-2">
                {{-- <x-icons.mileage class="w-4 h-4" /> --}}
                <span>{{ $car['mileage'] }}</span>
            </div>

        </div>

        <!-- Rating & Price -->
        <div class="flex items-center justify-between mb-4">
            @php
                $rating = $car['rating'];
                $full = floor($rating);
                $half = ($rating - $full) > 0;
                $empty = 5 - ceil($rating);
            @endphp

            <div class="flex items-center space-x-2">
                <div class="flex text-yellow-400">
                    @for($i=0; $i<$full; $i++)
                        ★
                    @endfor
                    @if($half)
                        ★
                    @endif
                    @for($i=0; $i<$empty; $i++)
                        <span class="text-gray-500">★</span>
                    @endfor
                </div>
                <span class="text-gray-400 text-sm">{{ $rating }}</span>
            </div>

            <div class="text-right">
                <span class="text-yellow-400 text-xl font-bold">{{ $car['price_per_day'] }} Birr</span>
                <span class="text-gray-400 text-sm">/day</span>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3 text-lg">
            @can('viewAny',$car)
                <button onclick="window.location='/car/edit/'+{{ $car->id }}"
                        class="btn-outline-gold flex-1 px-4 py-3 rounded-lg text-sm">
                    edit
                </button>
            @endcan
            

            <button 
                wire:click="$dispatch('open-rent-modal', { carId: {{ $car->id }} })"
                class="btn-gold flex-1 px-4 py-3 rounded-lg text-sm 
                {{ $car['availability_status'] != 'available'? 'opacity-50 cursor-not-allowed' : '' }}"
                {{ $car['availability_status'] != 'available' ? 'disabled' : '' }}>
                {{ $car['availability_status'] == 'available' ? 'bookings' : 'Unavailable' }}
            </button>

            @can('viewAny',$car)
                <button type="submit" form="deleteForm"
                        class="flex-1 px-4 py-3 rounded-lg text-sm border-2 border-red-600 text-red-600 font-semibold hover:bg-red-600/20">
                    delete
                </button>
            @endcan
        </div>
        {{-- car delete form --}}
        <form action="/car/delete/{{ $car->id }}" method="post" id="deleteForm">
            @csrf
            @method('DELETE')
        </form>
    </div>

</div>
