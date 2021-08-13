<div>
    <div class="flex items-center justify-center w-full h-full px-6 pt-32 pb-10 md:pt-20 lg:pt-32 lg:px-40 prop-px-20 prop-py-96">
        <div class="relative grid w-full h-auto grid-cols-1 space-y-2 lg:gap-2 lg:grid-cols-9 lg:space-y-0">
            <div class="flex items-center justify-center w-full h-full md:col-span-2">
                <div class="grid items-center justify-center w-full h-full grid-cols-1 gap-2">
                    <div class="grid items-center justify-center w-full h-full grid-cols-1 p-4 bg-white md:grid-cols-2 lg:grid-cols-1 rounded-xl">
                        <div class="flex items-center justify-center py-2 -mt-28 md:mt-0 lg:-mt-28">
                            <img src="{{is_null($national->image) ? asset('endorser.png') : asset('/national/'.$national->image)}}" class="transform w-44 h-44 hover:scale-105">
                        </div>
                        <div class="flex flex-col items-center justify-center space-y-2">
                            <div class="flex flex-col items-center justify-center">
                                <h2 class="text-lg font-extrabold text-center text-blue-900 uppercase font-futura">{{$national->fname.' '.$national->lname}}</h2>
                                <h6 class="text-xs font-bold uppercase">{{$national->farm}}</h6>
                            </div>
                            <ul class="pb-2 text-xs border-b-2 border-gray-300 border-dashed">
                                <li class="capitalize"><i class="fas fa-map-marker-alt"></i> {{$national->location}}</li>
                                <li class="{{is_null($national->email) ? 'hidden' : ''}}"><i class="fas fa-at"></i> {{$national->email}}</li>
                                <li class="{{is_null($national->contact) ? 'hidden' : ''}}"><i class="fas fa-phone"></i> {{$national->contact}}</li>
                            </ul>
                            <div class="flex flex-row items-center justify-center space-x-2">
                                <div class="flex flex-col text-center focus:outline-none {{is_null($national->fb) ? 'hidden' : ''}}">
                                    <a href="{{$national->fb}}" class="text-blue-700"><i class="fab fa-facebook-square"></i></a>
                                    <p class="text-xs text-gray-500">Facebook</p>
                                </div>
                                <div class="flex flex-col text-center focus:outline-none {{is_null($national->ig) ? 'hidden' : ''}}">
                                    <a href="{{$national->ig}}" class="text-pink-700"><i class="fab fa-instagram-square"></i></a>
                                    <p class="text-xs text-gray-500">Instagram</p>
                                </div>
                                <div class="flex flex-col text-center focus:outline-none {{is_null($national->website) ? 'hidden' : ''}}">
                                    <a href="{{$national->website}}" class="text-indigo-900"><i class="fas fa-globe"></i></a>
                                    <p class="text-xs text-gray-500">Website</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-start w-auto h-auto p-4 bg-white rounded-xl">
                        <h2 class="text-lg font-bold text-center text-blue-900 uppercase font-futura">ACHIEVEMENTS</h2>
                        <ul class="h-auto px-4 overflow-y-auto text-xs list-disc list-outside lg:h-64">
                            @foreach($national->achievements as $achievement)
                            <li>{{$achievement->title}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full h-full col-span-7 bg-white rounded-xl">
                <div class="grid items-start justify-start grid-cols-1 gap-2 p-2 md:p-10 md:grid-cols-4">
                    <div class="flex flex-row items-center justify-between w-full col-span-full">
                        <div class="flex flex-row items-center justify-start gap-6">
                            <button wire:click.prevent="updateCategory(0)" class="text-xl md:text-4xl focus:outline-none font-futura hover:text-yellow-300 {{ $category == 0 ? 'text-red-900' : 'text-gray-900' }}">BLOODLINES</button>
                            <button wire:click.prevent="updateCategory(1)" class="text-xl md:text-4xl focus:outline-none font-futura hover:text-yellow-300 {{ $category == 1 ? 'text-red-900' : 'text-gray-900' }}">VIDEOS</button>
                        </div>
                        <div class="flex flex-wrap items-center justify-end">
                            <a class="text-xs text-gray-700 hover:text-gray-900" href="{{url()->previous()}}"><i class="fas fa-chevron-circle-left"></i> GO BACK</a>
                        </div>
                    </div>
                    <div id="view_bloodlines" class="w-full bg-blue-900 border-4 border-gray-200 col-span-full h-full md:h-96 {{ $category == 0 ? 'block' : 'hidden' }}">
                        <div class="flex flex-col items-start justify-start">
                            <div class="flex flex-row w-full p-2 space-x-2 overflow-x-auto">
                                @foreach($bloodlines as $bloodline)
                                    <button wire:click.prevent="updatePhotos({{$bloodline->id}})" class="w-auto h-auto p-1 text-xs text-center bg-red-900 md:text-sm hover:text-yellow-300 focus:outline-none {{ $genID == $bloodline->id ? 'border-b-2 border-yellow-300 text-yellow-300' : 'text-white' }}">
                                        {{ $bloodline->title }}
                                    </button>
                                @endforeach
                            </div>
                            <div class="flex flex-row w-full">
                                <div class="w-full h-10 p-2 text-xs text-gray-900 capitalize bg-white md:text-sm">
                                    {{ $description }}
                                </div>
                            </div>
                            <div class="flex flex-row items-center justify-center w-full h-full p-6">
                                <a wire:click.prevent="previousPage" href="#" class="text-center text-xs px-2 py-1 bg-white rounded-full hover:text-yellow-300 focus:text-yellow-300 focus:outline-none {{$photos->onFirstPage() ? 'hidden' : 'text-blue-900'}}">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                                <div class="grid items-center justify-center grid-cols-1 gap-2 m-6 md:grid-cols-4">
                                    @foreach($photos as $photo)
                                        <div>
                                            <button type="button" class="focus:outline-none" onclick="toggleElement('zoom{{$photo->id}}')">
                                                <img class="block object-center w-auto h-40 transform hover:scale-105" src="{{asset('/bloodline/'.$photo->image)}}">
                                            </button>
                                        </div>
                                        <!-- Zoom Bloodline Image -->
                                        <div id="zoom{{$photo->id}}" class="fixed inset-0 z-10 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                                        
                                            <!-- This element is to trick the browser into centering the modal contents. -->
                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                <div class="flex flex-col p-6 bg-white">
                                                    <div class="z-50 flex items-center justify-end">
                                                        <button class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white" onclick="toggleElement('zoom{{$photo->id}}')">
                                                            <span class="sr-only">Close panel</span>
                                                            <!-- Heroicon name: outline/x -->
                                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="z-40 -mt-20">
                                                    <img class="block object-center w-full h-full" src="{{asset('/bloodline/'.$photo->image)}}">
                                                </div>
                                            </div>
                                            </div>
                                        </div>  
                                    @endforeach
                                </div>
                                <a wire:click.prevent="nextPage" href="#" class="text-center text-xs px-2 py-1 bg-white rounded-full hover:text-yellow-300 focus:text-yellow-300 focus:outline-none {{$photos->hasMorePages() ? 'text-blue-900' : 'hidden'}}">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="view_videos" class="w-full bg-blue-900 border-4 border-gray-200 col-span-full h-full md:h-96 {{ $category == 1 ? 'block' : 'hidden' }}">
                        <div class="flex flex-col items-start justify-start">
                            <div class="flex flex-row w-full p-2 space-x-2 border-b-2 border-white border-dashed">
                                <button wire:click.prevent="updateVideos({{0}})" class="w-auto h-auto p-1 text-xs text-center bg-red-900 md:text-sm hover:text-yellow-300 focus:outline-none {{ !is_null($vidID) && $vidID == 0 ? 'border-b-2 border-yellow-300 text-yellow-300' : 'text-white' }}">
                                    GAMEFARM
                                </button>
                                <button wire:click.prevent="updateVideos({{1}})" class="w-auto h-auto p-1 text-xs text-center bg-red-900 md:text-sm hover:text-yellow-300 focus:outline-none {{ !is_null($vidID) && $vidID == 1 ? 'border-b-2 border-yellow-300 text-yellow-300' : 'text-white' }}">
                                    SABONG MATCH
                                </button>
                            </div>
                            <div class="grid items-start justify-start w-full h-full grid-cols-1 overflow-y-auto md:gap-2 md:m-2 md:grid-cols-3">
                                @foreach($videos as $video)
                                    <div class="flex flex-col items-center justify-center w-full text-center">
                                        <video class="w-full border-gray-900 h-36 border-1" controls controlsList="nodownload">
                                            <source src="{{asset('video/'.$video->video)}}" type="video/mp4">
                                        </video>
                                        <small class="pt-1 text-xs font-extrabold text-white uppercase">{{$video->title}}</small>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
