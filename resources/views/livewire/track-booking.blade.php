
<main class="max-w-7xl mx-auto px-6 py-8">
@if ($booking)
    <header class="my-8">
      <div class="text-center mb-12 fade-in mt-12">
        <h1 class="text-6xl font-bold mb-2">
          Track Your Booking
        </h1>
        <p class="text-lg text-gray-500">
          View car details, status and payment information.
        </p>
      </div>
    </header>

    <!-- Main content -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 my-8">

      <!-- LEFT: Car + Booking Details -->
      <div class="lg:col-span-2 card p-6 animate-fade-up">

        <div class="flex flex-col items-start gap-6">

          <!-- Car Image -->
          <div class="w-full h-100 rounded-lg overflow-hidden flex items-center justify-center"
            style="background:linear-gradient(135deg, rgba(250,204,21,.06), rgba(245,158,11,.02))">

            {{-- {{ dump($booking->car->media->first()->file_path) }} --}}
            @if ($booking->car->media->first()->file_path)
                <img 
                    src="{{ asset('storage/' . $booking->car->media->first()->file_path) }}" 
                    alt="Car Image"
                    class="w-full h-64 object-cover rounded-lg shadow-md">
            @else
                <!-- fallback icon -->
                <svg class="w-40 h-40 text-yellow-500 opacity-40" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/>
                </svg>
            @endif

        </div>


          <!-- Booking Status -->
          <div class="flex items-center gap-2">
            <div class="p-2 text-md font-bold">Booking Status •</div>
            <div class="p-2 text-sm rounded-xl bg-green-400/20">
              {{ $status ?? 'N/A' }}
            </div>
          </div>

          <!-- Car Information -->
          <div>
            <h3 class="font-bold text-xl" style="font-family:Poppins, sans-serif; color:var(--color-dark-text)">
              {{ $booking->car->brand ?? 'Car' }} — {{ $booking->car->year ?? '' }}
            </h3>

            <p class="muted">
              Plate: {{ $booking->car->license_plate ?? 'N/A' }} • 
              {{ $booking->car->fuel_type ?? 'N/A' }} • 
              Seats: {{ $booking->car->seats ?? 'N/A' }} • 
              {{ $booking->car->transmission ?? 'N/A' }}
            </p>

            <div class="mt-4 grid grid-cols-2 gap-4">
              <div>
                <p class="muted text-xs">Pickup</p>
                <p class="font-semibold">
                  {{ $pickupDate ?? '---' }}
                </p>
              </div>

              <div>
                <p class="muted text-xs">Return</p>
                <p class="font-semibold">
                  {{ $returnDate ?? '---' }}
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- RIGHT: Payment + Actions -->
      <div class="card p-6 animate-fade-up">

        <h4 class="font-bold mb-3" style="font-family:Poppins, sans-serif; color:var(--color-dark-text)">
          Payment
        </h4>

        <div class="space-y-3">

          <div class="flex items-center justify-between">
            <div class="muted">Total Price</div>
            <div class="font-bold text-yellow-600">
              ${{ number_format($booking->total_price,2) ?? '0' }}
            </div>
          </div>

          <div class="mt-4 flex justify-between items-center">
            <div class="muted text-md">Payment Status</div>
            <div class="status-badge 
                    {{ $paymentStatus != 'paid'? 'bg-red-600/20 border border-red-700':
                        'bg-green-600/20 border border-green-700'  }}">
              {{ $paymentStatus ?? 'pending' }}
            </div>
          </div>

          <div class="mt-4">
            @if($paymentStatus !== 'paid')
              <button 
                wire:click="payNow"
                class="btn-secondary w-full py-2 rounded-xl mb-2">
                Pay Now
              </button>
            @endif

            @if(
                $booking->status === 'pending' ||
                ($booking->status === 'confirmed' && $paymentStatus !== 'paid')
            )
            <button 
              wire:click="cancelBooking"
              wire:loading.attr="disabled"
              class="w-full py-2 rounded-xl bg-red-400/20">
              <span wire:loading.remove>Cancel Booking</span>
              <span wire:loading>Processing...</span>
            </button>
            @endif

          </div>

        </div>
      </div>

    </section>
    {{-- chapa payment form  --}}
    <form method="POST"
      action="https://api.chapa.co/v1/hosted/pay"
      class="hidden"
      id="payment_form">

      <input type="hidden" name="public_key" value="{{ config('chapa.public_key') }}">
      <input type="hidden" name="tx_ref" id="tx_ref">
      <input type="hidden" name="amount" value="{{ $booking->total_price }}">
      <input type="hidden" name="currency" value="ETB">
      <input type="hidden" name="email" value="{{ $booking->customer->email }}">
      <input type="hidden" name="first_name" value="{{ $booking->customer->username }}">
      <input type="hidden" name="last_name" value="Customer">
      <input type="hidden" name="return_url" value="{{ route('payment.verify') }}">
  </form>

    <!-- Additional sections unchanged (owner info, timeline etc.) -->    
@else
<div class="font-bold text-2xl my-24 w-full flex justify-center capitalize items-center bg-gray-800 p-24 rounded-xl">
    there is no booking 
</div>
@endif   
<livewire:notification-widget />
</main>

<script>
  document.addEventListener('submit-payment-form', e => {
      document.getElementById('tx_ref').value = e.detail.txRef;
      document.getElementById('payment_form').submit();
  });
</script>

