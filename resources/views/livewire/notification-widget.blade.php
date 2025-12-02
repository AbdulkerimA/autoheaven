<div 
    x-data="{ show: false }"
    x-show="show"
    x-init="
        Livewire.on('notify', () => {
            show = true;
            setTimeout(() => show = false, 3000);
        });
    "
    x-transition
    class="fixed top-5 right-5 z-50"
>
    <div class="px-5 py-3 rounded-lg shadow-lg text-white"
         :class="{
            'bg-green-600': @js($type) === 'success',
            'bg-red-600': @js($type) === 'error',
            'bg-yellow-600': @js($type) === 'warning'
         }">

        {{ $message }}
    </div>
</div>
