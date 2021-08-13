<div>
    <div class="flex flex-row items-center justify-end space-x-2">
        <button type="button" class="inline-flex items-center px-4 py-2 space-x-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25" onclick="toggleElement('create')">
            <i class="fas fa-user-plus"></i> <p>CREATE</p>
        </button>
        <button type="button" class="inline-flex items-center px-4 py-2 space-x-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-900 border border-transparent rounded-md hover:bg-gray-300 hover:text-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25" onclick="toggleElement('locations')">
            <i class="fas fa-location-arrow"></i> <p>REGIONS</p>
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
                    Options
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($regionals as $regional)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                        <img class="w-auto h-10" src="{{is_null($regional->image) ? asset('endorser.png') : asset('/regional/'.$regional->image)}}" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-xs font-medium text-gray-900 uppercase">
                                {{$regional->name}}
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ is_null($regional->contact) ? null : '('. $regional->contact .')' }} {{ $regional->email }}
                            </div>
                        </div>
                    </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-xs text-gray-900 uppercase">{{$regional->farm}}</div>
                        <div class="text-xs text-gray-500 capitalize">{{$regional->location}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-row items-center justify-center space-x-2">
                            <div class="flex flex-col text-center focus:outline-none {{is_null($regional->fb) ? 'hidden' : ''}}">
                                <a href="{{$regional->fb}}" class="text-blue-700" target="_blank"><i class="fab fa-facebook-square"></i></a>
                                <p class="text-xs text-gray-500">Facebook</p>
                            </div>
                            <div class="flex flex-col text-center focus:outline-none {{is_null($regional->ig) ? 'hidden' : ''}}">
                                <a href="{{$regional->ig}}" class="text-pink-700" target="_blank"><i class="fab fa-instagram-square"></i></a>
                                <p class="text-xs text-gray-500">Instagram</p>
                            </div>
                            <div class="flex flex-col text-center focus:outline-none {{is_null($regional->website) ? 'hidden' : ''}}">
                                <a href="{{$regional->website}}" class="text-indigo-900" target="_blank"><i class="fas fa-globe"></i></a>
                                <p class="text-xs text-gray-500">Website</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-row items-center justify-center space-x-2">
                            <div class="flex flex-col text-center">
                                <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('update{{$regional->id}}')"><i class="fas fa-edit"></i></button>
                                <p class="text-xs text-gray-500">Edit</p>
                            </div>
                            <div class="flex flex-col text-center">
                                <form method="POST" action="{{route('regionals.destroy',$regional->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-900 focus:outline-none"><i class="fas fa-trash"></i></button>
                                <p class="text-xs text-gray-500">Delete</p>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>

                <div id="update{{$regional->id}}" class="fixed inset-0 z-50 hidden overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
                    <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                
                    <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
            
                        <div class="relative w-screen max-w-md">
                
                        <div class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl">
                            <div class="inline-flex items-center justify-between px-4 sm:px-6">
                            <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                UPDATE ENDORSER
                            </h2>
                            <button type="button" class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white" onclick="toggleElement('update{{$regional->id}}')">
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
                                    <form method="POST" action="{{route('regionals.update',$regional->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <dl>
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                    Region
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <select id="location_id" name="location_id" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                        <option id="location_id" name="location_id" value="{{$regional->location_id}}" selected>{{App\Models\RegionalLocation::find($regional->location_id)->name}}</option>
                                                        @foreach($rlocations as $rlocation)
                                                        <option id="location_id" name="location_id" value="{{$rlocation->id}}">{{$rlocation->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Full Name
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="name" class="block w-full" type="text" name="name" value="{{$regional->name}}" required autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Farm Name
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="farm" class="block w-full" type="text" name="farm" value="{{$regional->farm}}" required autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Location
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="location" class="block w-full" type="text" name="location" value="{{$regional->location}}" required autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Email Address
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="email" class="block w-full" type="email" name="email" value="{{$regional->email}}" autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Contact Number
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="contact" class="block w-full" type="text" name="contact" value="{{$regional->contact}}" autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Facebook
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="fb" class="block w-full" type="text" name="fb" value="{{$regional->fb}}" autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Instragram
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="ig" class="block w-full" type="text" name="ig" value="{{$regional->ig}}" autofocus />
                                                </dd>
                                            </div>
                                            <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="mt-3 text-sm font-medium text-gray-500">
                                                Website
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <x-jet-input id="website" class="block w-full" type="text" name="website" value="{{$regional->website}}" autofocus />
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
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>  
    
    <div class="p-2">
        {{$regionals->links()}}
    </div>

    <div id="locations" class="fixed inset-0 z-50 hidden overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
    
        <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">

            <div class="relative w-screen max-w-md">
    
            <div class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl">
                <div class="inline-flex items-center justify-between px-4 sm:px-6">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                    REGIONAL LOCATIONS
                </h2>
                <button type="button" class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white" onclick="toggleElement('locations')">
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
                        <form method="POST" action="{{route('regionals_location.store')}}">
                            @csrf
                            <dl>
                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Location
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="name" class="block w-full" type="text" name="name" required autofocus />
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
                            <div class="text-center border-b-2 border-gray-200 border-dashed bg-gray-50">LIST OF LOCATIONS</div>
                            <div class="grid items-center justify-center w-full h-full grid-cols-1 pt-2 overflow-y-auto">
                                @foreach($rlocations as $rlocation)
                                    <div class="grid items-center justify-center w-full h-full grid-cols-3 border-b-2 border-gray-200 border-dashed">
                                        <div class="flex items-center justify-between col-span-2 p-2 uppercase">
                                            <h1 class="text-xs">{{$rlocation->name}}</h1>
                                        </div>
                                        <div class="flex flex-row flex-wrap items-end justify-center space-x-2 text-xs">
                                            <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('edit_location{{$rlocation->id}}')"><i class="fas fa-edit"></i></button>
                                            <form method="POST" action="{{route('regionals_location.destroy',$rlocation->id)}}">
                                                @csrf
                                                @method('delete')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="edit_location{{$rlocation->id}}" class="hidden w-full h-full border-b-2 border-gray-200 border-dashed bg-gray-50">
                                        <form method="POST" action="{{route('regionals_location.update',$rlocation->id)}}">
                                        @csrf
                                        @method('patch')
                                        <div class="flex flex-row items-center justify-between p-2 uppercase">
                                            <input type="text" name="name" class="w-full text-xs rounded" value="{{$rlocation->name}}" placeholder="location" required>
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
                        <form method="POST" action="{{route('regionals.store')}}" enctype="multipart/form-data">
                            @csrf
                            <dl>
                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Location
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <select id="location_id" name="location_id" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            @foreach($rlocations as $rlocation)
                                            <option id="location_id" name="location_id" value="{{$rlocation->id}}">{{$rlocation->name}}</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Full Name
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="name" class="block w-full" type="text" name="name" required autofocus />
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
