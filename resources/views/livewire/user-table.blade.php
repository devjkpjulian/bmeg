<div>
    <div class="relative py-2">
        <svg width="20" height="20" fill="currentColor" class="absolute text-gray-400 transform -translate-y-1/2 left-3 top-1/2">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
        </svg>
        <input wire:model="search" class="w-full py-2 pl-10 text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none" type="text" placeholder="Search Users" />
    </div>
    
    <div class="flex flex-col py-4">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Role
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                            <img class="w-10 h-10 rounded-full" src="{{$user->profile_photo_url}}" alt="{{$user->name}}">
                            </div>
                            <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{$user->name}}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{$user->email}}
                            </div>
                            </div>
                        </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full {{is_null($user->email_verified_at) ? 'text-red-800 bg-red-100' : 'text-green-800 bg-green-100'}}">
                            {{is_null($user->email_verified_at) ? 'Pending' : 'Active'}}
                        </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            {{$user->admin == true ? 'Admin' : 'User'}}
                        </td>
                    </tr>   
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="p-2">
        {{$users->links()}}
    </div>
</div>
