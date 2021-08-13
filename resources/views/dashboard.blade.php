<x-app-layout>
    @if(auth()->user()->admin == true)
        <x-jet-welcome />
    @else
        @include('landing')
    @endif
</x-app-layout>
