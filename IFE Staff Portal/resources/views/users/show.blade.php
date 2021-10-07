<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Account') }}
        </h2>
    </x-slot>

    <div id="loading-screen" class="prevent-double hidden w-full h-full fixed block top-0 left-0 bg-white opacity-75 z-50">
        <span class="text-green-500 opacity-75 top-1/2 my-0 mx-auto block relative w-0 h-0">
           <svg class="animate-spin -ml-1 mr-3 h-10 w-10 text-purple-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-50" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>
        <br>
        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">Processing</span>
    </div>
    
    <div class="max-w-7xl mt-8 mx-auto rounded-lg py-5 sm:px-3 lg:px-4">
        <div class="block mb-8">
            <a href="{{ route('users') }}" class="inset-y-0 right-0 bg-blue-600 hover:bg-purple-600 text-white font-bold text-xs py-2 px-4 rounded">Back to Accounts</a>
        </div>

        <div class="block mb-5">
            <div class="relative">
                <div class="absolute right-0 block">
                @can('user_edit')
                    <div class="inline-block">
                        <div class="flex items-center justify-center w-full mb-12">
                            <form method="post" id="activetoggle" action="{{ route('user.deactivate', $user->id) }}">
                                @csrf
                            <label for="toggleB" class="flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input type="checkbox" id="toggleB" class="sr-only" value=""{{ $user->active ? 'checked' : '' }}
                                onchange="document.getElementById('activetoggle').submit()">
                                <!-- line -->
                                <div class="block bg-gray-300 w-8 h-4 rounded-full"></div>
                                <!-- dot -->
                                <div class="dot absolute left-0.2 top-0 bg-red-400 w-4 h-4 rounded-full transition"></div>
                            </div>
                            <!-- label -->
                            <div class="ml-3 text-gray-700 text-xs font-bold">
                                Account @if($user->active == 1)Enabled @else Disabled @endif
                            </div>
                            </label>
                            </form>
                        </div>
                        <style>
                            input:checked ~ .dot 
                            {
                            transform: translateX(100%);
                            background-color: #48bb78;
                            }
                        </style>
                    </div>
                @endcan
                </div>
            </div>
        </div>
        <br>
          @if (session()->has('message'))
          <div x-data="{ show: true }" x-show="show">
               <div class="flex font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-700 ">
                     <div slot="avatar" class="relative mt-3 ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather text-white mr-3 feather-check-circle w-5 h-5 mx-2">
                           <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                           <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                     </div>
                     <div class="text-xl font-normal text-white items-center justify-center max-w-full flex-initial">
                        <div class="py-2">Successfully Completed
                           <div class="text-sm font-base">{{ session('message') }}</div>
                        </div>
                     </div>
               </div>
         </div>
          @endif
          @if (session()->has('failed'))
          <div x-data="{ show: true }" x-show="show">
            <div class="flex font-medium py-1 px-2 bg-white rounded-md text-red-100 bg-red-700 border border-red-700 ">
               <div slot="avatar" class="relative mt-3 ml-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
               </div>
                  <div class="text-xl font-normal text-white items-center justify-center max-w-full flex-initial">
                     <div class="py-2">Request Failed
                        <div class="text-sm font-base">{{ session('failed') }}</div>
                     </div>
                  </div>
          </div>
          @endif  
    </div>

    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-5 sm:px-3 lg:px-4">          
            <div id="user_data" class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="container mx-auto my-5 p-5">
                                            <div class="md:flex no-wrap md:-mx-2 ">
                                                <!-- Left Side -->
                                                <div class="w-full md:w-3/12 md:mx-2">
                                                    <!-- Profile Card -->
                                                    <div class="bg-white p-3 border-t-3 border-purple-600">

                                                        <div class="image overflow-hidden rounded-md">
                                                            <img class="h-48 w-48 rounded-lg shadow-lg mx-auto" src="{{ $user->profile_photo_url }}" alt="">
                                                        </div>

                                                        <h1 class="text-gray-900 font-bold text-lg leading-8 my-1">{{ $user->name }}</h1>
                                                        <h1 class="text-gray-900 font-bold text-sm leading-8 my-1">{{ $user->email }}</h1>
                                                        <ul
                                                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                                            <li class="flex items-center py-3 text-xs">
                                                                <span>Status</span>
                                                                    <span class="ml-auto">
                                                                        @if($user->active == 1)
                                                                        <h3 class="text-gray-600 text-xs text-green-600 text-semibold leading-6">Active</h3>
                                                                    @else 
                                                                        <h3 class="text-gray-600 text-xs text-red-600 text-semibold leading-6">Deactivated</h3>
                                                                    @endif
                                                                </span>
                                                            </li>
                                                            <li class="flex items-center text-xs py-3">
                                                                <span>User since</span>
                                                                <span class="ml-auto text-xs">{{ $user->created_at->format('j F, Y') }}</span>
                                                            </li>
                                                            <li class="flex items-center text-xs py-3">
                                                                <span>Permissions</span>
                                                                @foreach ($user->roles as $role)
                                                                <span class="ml-auto text-xs">{{$role->title }}</span>
                                                                @endforeach
                                                            </li>
                                                            <div class="absolute right-0 block">
                                                        </ul>
                                                    </div>
                                                    <!-- End of profile card -->
                                                    <div class="my-4"></div>
                                                    <!-- Friends card -->
                                                    <div class="bg-white p-3 rounded-lg hover:shadow">
                                                        <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                                            <span class="text-green-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                                </svg>
                                                            </span>
                                                            <span class="text-sm">Department Members</span>
                                                        </div>
                                                        <div class="grid grid-cols-3">
                                                            @foreach($users as $members)
                                                            <div class="text-center my-2">
                                                                <img class="h-16 w-16 rounded-full mx-auto" src="{{ $members->profile_photo_url }}" alt="">
                                                                <a href="{{ route('user.show', $members->id) }}" class="text-main-color text-xs">{{ $members->name }}</a>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <!-- End of friends card -->
                                                </div>
                                                <!-- Right Side -->
                                                <div class="w-full md:w-9/12 mx-2 h-64">
                                                    <!-- Profile tab -->
                                                    <!-- About Section -->
                                                    <div class="bg-white p-3 shadow-sm rounded-sm">
                                                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                                            <span clas="text-green-500">
                                                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                                </svg>
                                                            </span>
                                                            <span class="tracking-wide text-gray-900">User Details</span>
                                                        </div>
                                                        <div class="text-gray-600">
                                                            <div class="grid md:grid-cols-2 text-sm">
                                                                <div class="grid grid-cols-2">
                                                                    <div class="px-4 py-2 font-bold">Name:</div>
                                                                    <div class="px-4 py-2">{{ $user->name }}</div>
                                                                </div>

                                                                <div class="grid grid-cols-2">
                                                                    <div class="px-4 py-2 font-bold">Department:</div>
                                                                    <div class="px-4 py-2">{{ $user->department }}</div>
                                                                </div>

                                                                <div class="grid grid-cols-2">
                                                                    <div class="px-4 py-2 font-bold">Organisation:</div>
                                                                    <div class="px-4 py-2">{{ $user->organisation }}</div>
                                                                </div>

                                                                <div class="grid grid-cols-2">
                                                                    <div class="px-4 py-2 font-bold">Email:</div>
                                                                    <div class="px-4 py-2">
                                                                        @can('user_access')
                                                                        <a class="text-blue-800" href="{{ $user->email }}">{{ $user->email }}</a>
                                                                        @endcan
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End of about section -->
                                                    <div class="bg-white p-3 shadow-sm rounded-sm">
                                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                            <h2 class="mb-2 mt-4 font-extrabold float-left tracking-tight text-gray-700">
                                                                Assigned Clients
                                                            </h2>
                                                        </div>
                                                    </div>         
                                                </div>              
                                            </div>
                                            <!-- End of profile tab -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>