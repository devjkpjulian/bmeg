<a href="{{ request()->routeIs('register') == true ? route('login') : route('register') }}">
    <img class="w-auto h-32" src="{{ asset('logo.png') }}">
</a>
