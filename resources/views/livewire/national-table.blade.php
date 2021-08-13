<div>

    <div class="flex flex-row items-center justify-end">
        <button type="button" class="inline-flex items-center px-4 py-2 space-x-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25" onclick="toggleElement('create')">
            <i class="fas fa-user-plus"></i> <p>CREATE</p>
        </button>
    </div>
    
    <div class="relative py-2">
        <svg width="20" height="20" fill="currentColor" class="absolute text-gray-400 transform -translate-y-1/2 left-3 top-1/2">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
        </svg>
        <input wire:model="search" class="w-full py-2 pl-10 text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none" type="text" placeholder="Search Endorsers" />
    </div>
    
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Endorser's Info
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Farm
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                    Social Media
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                    Assets
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                    Options
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($nationals as $national)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                        <img class="w-auto h-10" src="{{is_null($national->image) ? asset('endorser.png') : asset('/national/'.$national->image)}}" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-xs font-medium text-gray-900 uppercase">
                                {{$national->fname.' '.$national->lname}}
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ is_null($national->contact) ? null : '('. $national->contact .')' }} {{ $national->email }}
                            </div>
                        </div>
                    </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-xs text-gray-900 uppercase">{{$national->farm}}</div>
                        <div class="text-xs text-gray-500 capitalize">{{$national->location}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-row items-center justify-center space-x-2">
                            <div class="flex flex-col text-center focus:outline-none {{is_null($national->fb) ? 'hidden' : ''}}">
                                <a href="{{$national->fb}}" class="text-blue-700" target="_blank"><i class="fab fa-facebook-square"></i></a>
                                <p class="text-xs text-gray-500">Facebook</p>
                            </div>
                            <div class="flex flex-col text-center focus:outline-none {{is_null($national->ig) ? 'hidden' : ''}}">
                                <a href="{{$national->ig}}" class="text-pink-700" target="_blank"><i class="fab fa-instagram-square"></i></a>
                                <p class="text-xs text-gray-500">Instagram</p>
                            </div>
                            <div class="flex flex-col text-center focus:outline-none {{is_null($national->website) ? 'hidden' : ''}}">
                                <a href="{{$national->website}}" class="text-indigo-900" target="_blank"><i class="fas fa-globe"></i></a>
                                <p class="text-xs text-gray-500">Website</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-row items-center justify-center space-x-2">
                            <div class="flex flex-col text-center">
                                <button type="button" class="text-yellow-300 focus:outline-none" onclick="toggleElement('achievements{{$national->id}}')"><i class="fas fa-star"></i></button>
                                <p class="text-xs text-gray-500">Achievements</p>
                            </div>
                            <div class="flex flex-col text-center">
                                <button type="button" class="text-red-900 focus:outline-none" onclick="toggleElement('bloodlines{{$national->id}}')"><i class="fas fa-egg"></i></button>
                                <p class="text-xs text-gray-500">Bloodlines</p>
                            </div>
                            <div class="flex flex-col text-center">
                                <button type="button" class="text-indigo-900 focus:outline-none"  onclick="toggleElement('videos{{$national->id}}')"><i class="fas fa-photo-video"></i></button>
                                <p class="text-xs text-gray-500">Videos</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-row items-center justify-center space-x-2">
                            <div class="flex flex-col text-center">
                                <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('update{{$national->id}}')"><i class="fas fa-edit"></i></button>
                                <p class="text-xs text-gray-500">Edit</p>
                            </div>
                            <div class="flex flex-col text-center">
                                <form method="POST" action="{{route('nationals.destroy',$national->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-900 focus:outline-none"><i class="fas fa-trash"></i></button>
                                <p class="text-xs text-gray-500">Delete</p>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>

                <div id="update{{$national->id}}" class="fixed inset-0 z-50 hidden overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
                    <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                
                    <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
            
                        <div class="relative w-screen max-w-md">
                
                        <div class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl">
                            <div class="inline-flex items-center justify-between px-4 sm:px-6">
                            <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                UPDATE ENDORSER
                            </h2>
                            <button type="button" class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white" onclick="toggleElement('update{{$national->id}}')">
                                <span class="sr-only">Close panel</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            </div>
                            <div class="relative flex-1 px-4 mt-6 sm:px-6">
                            <div class="absolute inset-0 px-4 sm:px-6">
                                <div class="h-full border-2 border-gray-200 border-dashed" aria-hidden="true">
                                    <form method="POST" action="{{route('nationals.update',$national->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <dl>
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                First Name
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="fname" class="block w-full" type="text" name="fname" value="{{$national->fname}}" required autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Last Name
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="lname" class="block w-full" type="text" name="lname" value="{{$national->lname}}" required autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Farm Name
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="farm" class="block w-full" type="text" name="farm" value="{{$national->farm}}" required autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Location
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="location" class="block w-full" type="text" name="location" value="{{$national->location}}" required autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Email Address
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="email" class="block w-full" type="email" name="email" value="{{$national->email}}" autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Contact Number
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="contact" class="block w-full" type="text" name="contact" value="{{$national->contact}}" autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Facebook
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="fb" class="block w-full" type="text" name="fb" value="{{$national->fb}}" autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Instragram
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="ig" class="block w-full" type="text" name="ig" value="{{$national->ig}}" autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Website
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="website" class="block w-full" type="text" name="website" value="{{$national->website}}" autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Profile Image
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                <input id="image" name="image" type="file" class="items-center block w-full px-4 py-2 mt-2 mr-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" accept="image/*">
                                                </dd>
                                            </div>
                                            <div class="py-2 m-2 border-t-2 border-gray-200 border-dashed">
                                                <button type="submit" class="items-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                                    UPDATE
                                                </button>
                                            </div>
                                        </dl>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div id="achievements{{$national->id}}" class="fixed inset-0 z-50 hidden overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
                    <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                
                    <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
            
                        <div class="relative w-screen max-w-md">
                
                        <div class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl">
                            <div class="inline-flex items-center justify-between px-4 sm:px-6">
                            <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                ACHIEVEMENTS
                            </h2>
                            <button type="button" class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white" onclick="toggleElement('achievements{{$national->id}}')">
                                <span class="sr-only">Close panel</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            </div>
                            <div class="relative flex-1 px-4 mt-6 sm:px-6">
                            <div class="absolute inset-0 px-4 sm:px-6">
                                <div class="h-full overflow-y-auto border-2 border-gray-200 border-dashed" aria-hidden="true">
                                    <form method="POST" action="{{route('achievements.store')}}">
                                        @csrf
                                        <dl>
                                            <input type="hidden" name="national_id" value="{{$national->id}}">
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Achievement
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="title" class="block w-full" type="text" name="title" required autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white border-b-2 border-gray-200 border-dashed sm:px-6">
                                                <div class="flex items-center justify-end">
                                                    <button type="submit" class="items-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                                        CREATE
                                                    </button>
                                                </div>
                                            </div>
                                        </dl>
                                    </form>
                                    <dl class="flex flex-col overflow-y-auto border-gray-200 border-dashed">
                                        <div class="text-center border-b-2 border-gray-200 border-dashed bg-gray-50">LIST OF ACHIEVEMENTS</div>
                                        <div class="grid items-center justify-center w-full h-full grid-cols-1 pt-2 overflow-y-auto">
                                            @foreach($national->achievements as $achievement)
                                                <div class="grid items-center justify-center w-full h-full grid-cols-3 border-b-2 border-gray-200 border-dashed">
                                                    <div class="flex items-center justify-between col-span-2 p-2 uppercase">
                                                        <h1 class="text-xs">{{$achievement->title}}</h1>
                                                    </div>
                                                    <div class="flex flex-row flex-wrap items-end justify-center space-x-2 text-xs">
                                                        <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('edit_achievement{{$achievement->id}}')"><i class="fas fa-edit"></i></button>
                                                        <form method="POST" action="{{route('achievements.destroy',$achievement->id)}}">
                                                            @csrf
                                                            @method('delete')
                                                                <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id="edit_achievement{{$achievement->id}}" class="hidden w-full h-full border-b-2 border-gray-200 border-dashed bg-gray-50">
                                                    <form method="POST" action="{{route('achievements.update',$achievement->id)}}">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="flex flex-row items-center justify-between p-2 uppercase">
                                                        <input type="text" name="title" class="w-full text-xs rounded" value="{{$achievement->title}}" placeholder="Title" required>
                                                        <div class="flex flex-row flex-wrap items-end justify-center m-2">
                                                            <button type="submit" class="items-center w-full p-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                                                UPDATE
                                                            </button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            @endforeach
                                        </div>
                                    </dl>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div id="bloodlines{{$national->id}}" class="fixed inset-0 z-50 hidden overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
                    <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                
                    <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
            
                        <div class="relative w-screen max-w-md">
                
                        <div class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl">
                            <div class="inline-flex items-center justify-between px-4 sm:px-6">
                            <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                BLOODLINES
                            </h2>
                            <button type="button" class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white" onclick="toggleElement('bloodlines{{$national->id}}')">
                                <span class="sr-only">Close panel</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            </div>
                            <div class="relative flex-1 px-4 mt-6 sm:px-6">
                            <div class="absolute inset-0 px-4 sm:px-6">
                                <div class="h-full overflow-y-auto border-2 border-gray-200 border-dashed" aria-hidden="true">
                                    <form method="POST" action="{{route('bloodlines.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <dl>
                                        <input type="hidden" name="national_id" value="{{$national->id}}">
                                        <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                            Title
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-jet-input id="title" class="block w-full" type="text" name="title" required autofocus />
                                            </dd>
                                        </div>
                                        <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                            Description
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                <textarea id="description" name="description" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                            </dd>
                                        </div>
                                        <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                            Images
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                <input id="image" name="file[]" type="file" class="items-center block w-full px-4 py-2 mt-2 mr-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" accept="image/*" multiple="multiple">
                                            </dd>
                                        </div>
                                        <div class="px-4 py-2 bg-white border-b-2 border-gray-200 border-dashed sm:px-6">
                                            <div class="flex items-center justify-end">
                                                <button type="submit" class="items-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                                    CREATE
                                                </button>
                                            </div>
                                        </div>
                                    </dl>
                                    </form>
                                    <dl>
                                        <div class="text-center border-b-2 border-gray-200 border-dashed bg-gray-50">LIST OF BLOODLINES</div>
                                        <div class="grid items-center justify-center w-full h-full grid-cols-1 pt-2 overflow-y-auto">
                                            @foreach($national->bloodlines as $bloodline)
                                                <div class="flex items-center justify-between p-2 uppercase border-b-2 border-gray-200 border-dashed">
                                                    <h1 class="text-xs">{{ $bloodline->title }}</h1>
                                                    <div class="flex flex-row flex-wrap items-center justify-center space-x-2 text-xs">
                                                        <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('edit_bloodline{{$bloodline->id}}')"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('edit_image{{$bloodline->id}}')"><i class="fas fa-images"></i></button>
                                                        <form method="POST" action="{{route('bloodlines.destroy',$bloodline->id)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id="edit_image{{$bloodline->id}}" class="hidden w-full h-32 p-4 overflow-y-auto bg-white border-b-2 border-gray-200 border-dashed">
                                                    <div class="grid items-center justify-center grid-cols-3 gap-2">
                                                        @foreach($bloodline->images as $photo)
                                                        <div class="flex flex-col items-center justify-center w-auto h-auto">
                                                            <img src="{{asset('bloodline/'.$photo->image)}}" class="w-20 h-20" />
                                                            <form method="POST" action="{{route('bloodlines_images.destroy',$photo->id)}}">
                                                                @csrf
                                                                @method('delete')
                                                                    <button type="submit" class="py-2 text-xs text-red-600 hover:text-red-900 focus:outline-none"><i class="fas fa-trash"></i> Delete</button>
                                                            </form>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div id="edit_bloodline{{$bloodline->id}}" class="hidden w-full h-full border-b-2 border-gray-200 border-dashed bg-gray-50">
                                                    <form method="POST" action="{{route('bloodlines.update',$bloodline->id)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="flex flex-col items-center justify-between p-2 space-y-2 uppercase">
                                                        <input type="text" name="title" class="w-full text-xs border border-gray-900 rounded" value="{{$bloodline->title}}" placeholder="Title" required>
                                                        <textarea id="description" name="description" class="w-full text-sm border border-gray-900 rounded" placeholder="Bloodline Description...">{{$bloodline->description}}</textarea>
                                                        <input id="image" name="file[]" type="file" class="items-center block w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-900 rounded hover:text-gray-500 focus:outline-none active:text-gray-800 active:bg-gray-50" accept="image/*" multiple="multiple">
                                                        <button type="submit" class="items-center w-full p-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                                            UPDATE
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            @endforeach
                                        </div>
                                    </dl>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div id="videos{{$national->id}}" class="fixed inset-0 z-50 hidden overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
                    <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                
                    <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
            
                        <div class="relative w-screen max-w-md">
                
                        <div class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl">
                            <div class="inline-flex items-center justify-between px-4 sm:px-6">
                            <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                VIDEOS
                            </h2>
                            <button type="button" class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white" onclick="toggleElement('videos{{$national->id}}')">
                                <span class="sr-only">Close panel</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            </div>
                            <div class="relative flex-1 px-4 mt-6 sm:px-6">
                            <div class="absolute inset-0 px-4 sm:px-6">
                                <div class="h-full overflow-y-auto border-2 border-gray-200 border-dashed" aria-hidden="true">
                                    <form method="POST" action="{{route('nationals_videos.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <dl>
                                            <input type="hidden" name="national_id" value="{{$national->id}}">
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Title
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="title" class="block w-full" type="text" name="title" required autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Category
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <select id="category" name="category" class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                        <option id="category" name="category" value="0">GAMEFARM</option>
                                                        <option id="category" name="category" value="1">SABONG MATCH</option>
                                                    </select>
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Video
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <input id="video" name="video" type="file" class="items-center block w-full px-4 py-2 mt-2 mr-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" accept="video/*" required>
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white border-b-2 border-gray-200 border-dashed sm:px-6">
                                                <div class="flex items-center justify-end">
                                                    <button type="submit" class="items-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                                        CREATE
                                                    </button>
                                                </div>
                                            </div>
                                        </dl>
                                    </form>
                                    <dl class="flex flex-col overflow-y-auto border-gray-200 border-dashed">
                                        <button type="button" class="text-center border-b-2 border-gray-200 border-dashed bg-gray-50 focus:outline-none" onclick="toggleElement('gamefarm{{$national->id}}')">GAMEFARM</button>
                                        <div id="gamefarm{{$national->id}}" class="hidden w-full h-full overflow-y-auto">
                                            <div class="grid items-center justify-center w-full h-full grid-cols-1 border-b-2 border-gray-200 border-dashed">
                                                @foreach($national->videos->where('category',false) as $gamefarm)
                                                    <div class="grid items-center justify-center w-full h-full grid-cols-3 border-b-2 border-gray-200 border-dashed">
                                                        <div class="flex items-center justify-between col-span-2 p-2 uppercase">
                                                            <h1 class="text-xs">{{$gamefarm->title}}</h1>
                                                        </div>
                                                        <div class="flex flex-row flex-wrap items-center justify-center space-x-2 text-xs">
                                                            <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('view_video{{$gamefarm->id}}')"><i class="fas fa-play"></i></button>
                                                            <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('edit_video{{$gamefarm->id}}')"><i class="fas fa-edit"></i></button>
                                                            <form method="POST" action="{{route('nationals_videos.destroy',$gamefarm->id)}}">
                                                                @csrf
                                                                @method('delete')
                                                                    <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none"><i class="fas fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div id="view_video{{$gamefarm->id}}" class="hidden w-full h-full border-t-2 border-gray-200 border-dashed bg-gray-50">
                                                        <video class="w-full h-full p-6 border-gray-900 border-1" controls>
                                                            <source src="{{asset('video/'.$gamefarm->video)}}" type="video/mp4">
                                                        </video>
                                                    </div>
                                                    <div id="edit_video{{$gamefarm->id}}" class="hidden w-full h-full bg-white border-t-2 border-gray-200 border-dashed">
                                                        <form method="POST" action="{{route('nationals_videos.update',$gamefarm->id)}}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="national_id" value="{{$national->id}}">
                                                        <div class="flex flex-col items-center justify-between p-2 space-y-2 uppercase">
                                                            <input type="text" name="title" class="w-full text-xs border border-gray-900 rounded" value="{{$gamefarm->title}}" placeholder="Title" required>
                                                            <select id="category" name="category" class="w-full text-sm border border-gray-900 rounded">
                                                                <option id="category" name="category" value="0" {{$gamefarm->category == false ? ' selected' : ''}}>GAMEFARM</option>
                                                                <option id="category" name="category" value="1" {{$gamefarm->category == true ? ' selected' : ''}}>SABONG MATCH</option>
                                                            </select>
                                                            <input id="video" name="video" type="file" class="items-center block w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-900 rounded hover:text-gray-500 focus:outline-none active:text-gray-800 active:bg-gray-50" accept="video/*">
                                                            <button type="submit" class="items-center w-full p-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                                                UPDATE
                                                            </button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <button type="button" class="text-center border-b-2 border-gray-200 border-dashed bg-gray-50 focus:outline-none" onclick="toggleElement('sabongmatch{{$national->id}}')">SABONG MATCH</button>
                                        <div id="sabongmatch{{$national->id}}" class="hidden w-full h-full overflow-y-auto">
                                            <div class="grid items-center justify-center w-full h-full grid-cols-1 border-b-2 border-gray-200 border-dashed">
                                                @foreach($national->videos->where('category',true) as $sabongmatch)
                                                    <div class="grid items-center justify-center w-full h-full grid-cols-3 border-b-2 border-gray-200 border-dashed">
                                                        <div class="flex items-center justify-between col-span-2 p-2 uppercase">
                                                            <h1 class="text-xs">{{$sabongmatch->title}}</h1>
                                                        </div>
                                                        <div class="flex flex-row flex-wrap items-center justify-center space-x-2 text-xs">
                                                            <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('view_video{{$sabongmatch->id}}')"><i class="fas fa-play"></i></button>
                                                            <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('edit_video{{$sabongmatch->id}}')"><i class="fas fa-edit"></i></button>
                                                            <form method="POST" action="{{route('nationals_videos.destroy',$sabongmatch->id)}}">
                                                                @csrf
                                                                @method('delete')
                                                                    <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none"><i class="fas fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div id="view_video{{$sabongmatch->id}}" class="hidden w-full h-full border-t-2 border-gray-200 border-dashed bg-gray-50">
                                                        <video class="w-full h-full p-6 border-gray-900 border-1" controls>
                                                            <source src="{{asset('video/'.$sabongmatch->video)}}" type="video/mp4">
                                                        </video>
                                                    </div>
                                                    <div id="edit_video{{$sabongmatch->id}}" class="hidden w-full h-full bg-white border-t-2 border-gray-200 border-dashed">
                                                        <form method="POST" action="{{route('nationals_videos.update',$sabongmatch->id)}}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="national_id" value="{{$national->id}}">
                                                        <div class="flex flex-col items-center justify-between p-2 space-y-2 uppercase">
                                                            <input type="text" name="title" class="w-full text-xs border border-gray-900 rounded" value="{{$sabongmatch->title}}" placeholder="Title" required>
                                                            <select id="category" name="category" class="w-full text-sm border border-gray-900 rounded">
                                                                <option id="category" name="category" value="0" {{$sabongmatch->category == false ? ' selected' : ''}}>GAMEFARM</option>
                                                                <option id="category" name="category" value="1" {{$sabongmatch->category == true ? ' selected' : ''}}>SABONG MATCH</option>
                                                            </select>
                                                            <input id="video" name="video" type="file" class="items-center block w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-900 rounded hover:text-gray-500 focus:outline-none active:text-gray-800 active:bg-gray-50" accept="video/*">
                                                            <button type="submit" class="items-center w-full p-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                                                UPDATE
                                                            </button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>  
    
    <div class="p-2">
        {{$nationals->links()}}
    </div>

    <div id="create" class="fixed inset-0 z-50 hidden overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
    
        <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">

            <div class="relative w-screen max-w-md">
    
            <div class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl">
                <div class="inline-flex items-center justify-between px-4 sm:px-6">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                    CREATE ENDORSER
                </h2>
                <button type="button" class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white" onclick="toggleElement('create')">
                    <span class="sr-only">Close panel</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                </div>
                <div class="relative flex-1 px-4 mt-6 sm:px-6">
                <div class="absolute inset-0 px-4 sm:px-6">
                    <div class="h-full border-2 border-gray-200 border-dashed" aria-hidden="true">
                        <form method="POST" action="{{route('nationals.store')}}" enctype="multipart/form-data">
                            @csrf
                            <dl>
                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    First Name
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="fname" class="block w-full" type="text" name="fname" required autofocus />
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Last Name
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="lname" class="block w-full" type="text" name="lname" required autofocus />
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Farm Name
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="farm" class="block w-full" type="text" name="farm" required autofocus />
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Location
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="location" class="block w-full" type="text" name="location" required autofocus />
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Email Address
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="email" class="block w-full" type="email" name="email" autofocus />
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Contact Number
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="contact" class="block w-full" type="text" name="contact" autofocus />
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Facebook
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="fb" class="block w-full" type="text" name="fb" autofocus />
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Instragram
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="ig" class="block w-full" type="text" name="ig" autofocus />
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Website
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="website" class="block w-full" type="text" name="website" autofocus />
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Profile Image
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input id="image" name="image" type="file" class="items-center block w-full px-4 py-2 mt-2 mr-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" accept="image/*">
                                    </dd>
                                </div>
                                <div class="py-2 m-2 border-t-2 border-gray-200 border-dashed">
                                    <button type="submit" class="items-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                        CREATE
                                    </button>
                                </div>
                            </dl>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

</div>
