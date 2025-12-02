<div 
    x-data="{ show: false }"
    x-show="show"
    x-transition
    x-on:notify.window="
        show = true;
        setTimeout(() => show = false, 3000);
    "
    class="fixed top-5 right-5 z-50"
>
    <div class="px-5 py-3 rounded-lg shadow-lg text-white mt-12"
         :class="{
            'bg-green-600/80': '{{ $type }}' === 'success',
            'bg-red-600/20': '{{ $type }}' === 'error',
            'bg-yellow-600/20': '{{ $type }}' === 'warning'
         }">

        {{ $message }}
    </div>
</div>
