<div class="flex flex-col items-center justify-center min-h-screen bg-cover" style="background-image: url({{asset('bg.png')}})">
    <div class="z-50">
        {{ $logo }}
    </div>

    <div class="z-0 w-full p-6 -mt-4 overflow-hidden bg-cover border-4 border-white shadow-md sm:max-w-md sm:rounded-lg"  style="background-image: url({{asset('card.png')}})">
        {{ $slot }}
    </div>
</div>
