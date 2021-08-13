<x-app-layout>
    <div class="relative px-6 py-12 md:px-40">
        <div class="grid items-center justify-center w-full h-full grid-cols-1 gap-6 md:grid-cols-5">
            <div class="flex flex-col items-center justify-center w-auto h-auto md:col-span-5">
                <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
                    <img src="{{asset('logo.png')}}" class="w-auto h-20 transform hover:scale-105">
                </a>
                <h1 class="py-2 text-3xl text-red-900 font-futura stroke-white">NATIONAL ENDORSERS</h1>
            </div>
            @foreach($nationals as $national)
            <div class="flex flex-col items-center justify-center w-auto h-auto p-4 transform bg-gray-100 shadow rounded-xl hover:scale-105">
                <a class="text-center" href="{{route('nationals.show',$national->id)}}">
                    <div class="inline-flex w-40 h-40 overflow-hidden">
                        <img src="{{is_null($national->image) ? asset('endorser.png') : asset('/national/'.$national->image)}}" class="z-20 w-full h-full shadow-xl">
                    </div>
                    <h2 class="font-extrabold text-center text-blue-900 uppercase text-md font-futura">{{$national->fname.' '.$national->lname}}</h2>
                    <h6 class="text-xs font-medium uppercase">{{$national->farm}}</h6>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>