<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('System Accounts') }}
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
    </div>

   <div class="max-w-7xl mt-8 mx-auto rounded-lg py-5 sm:px-3 lg:px-4">
      <div class="block mb-1">
         @can('user_create')
         <a href="{{ route('user.create') }}" class="inset-y-0 right-0 bg-green-600 hover:bg-green-700 text-white font-bold text-xs py-2 px-4 rounded">Create Account</a>
         @endcan
         <a href="{{ route('roles') }}" class="inset-y-0 right-0 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs py-2 px-4 rounded">Roles & Permissions</a>
         
         @csrf
         <form action="#" method="GET" role="search">
            <div class="font-sans mt-4 text-grey-600 bg-gray-100 flex rounded-xl">
               <div class="border rounded overflow-hidden flex">
                  <input type="text" class="px-4 py-2 text-sm border-transparent rounded-sm text-gray-500" name="name" placeholder="Search Accounts">
                  <button class="flex items-center justify-center px-4 border-l">
                     @if($users->count() < 2)
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-grey-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      @else
                     <svg class="h-4 w-4 text-grey-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/>
                     </svg>
                     @endif
                  </button>
               </div>
            </div>
         </form>
      </div>
      <br>
          @if (session()->has('message'))
          <div x-data="{ show: true }" x-show="show">
               <div class="flex font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-700 ">
                     <div slot="avatar" class="relative mt-3">
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
          <br>
          @endif
          @if (session()->has('failed'))
          <div x-data="{ show: true }" x-show="show" class=" w-11/12 md:w-2/5 bg-white my-2 rounded-md px-6 border-l-4  border-red-500">
            <div slot="avatar" class="relative mt-3">
               <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather text-white mr-3 feather-check-circle w-5 h-5 mx-2">
                  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                  <polyline points="22 4 12 14.01 9 11.01"></polyline>
               </svg>
            </div>
               <div class="text-xl font-normal text-white items-center justify-center max-w-full flex-initial">
                  <div class="py-2">Request Failed
                     <div class="text-sm font-base">{{ session('failed') }}</div>
                  </div>
               </div>
          </div>
          <br>
          @endif 
          
      <div id="user_data" class="flex flex-col">
         <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
               <div class="shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg">
                  <div class="flex flex-col">
                     <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                           <div class="shadow overflow-hidden border-b border-gray-200">
                              @if (count($users) > 0)
                              <h2 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-700">
                                 User Accounts
                              </h2>
                           </div>
                           <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                 <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Role
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Organisation
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Last Login
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                       <span class="sr-only">Options</span>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                 @foreach ($users as $user)
                                 <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                       <div class="flex items-center">
                                          <div class="flex-shrink-0 h-10 w-10">
                                             <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
                                          </div>
                                          <div class="ml-4">
                                             <div class="text-sm font-semibold font-medium text-gray-900">
                                                {{ $user->name }}
                                             </div>
                                             <div class="text-sm text-gray-500">
                                                {{ $user->email }}
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                       <div class="text-sm font-semibold text-gray-900">{{ $user->job_title }}</div>
                                       <div class="text-sm text-gray-500">{{ $user->department }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-500">
                                       @foreach ($user->roles as $role)
                                       @if($role->title === "Admin")
                                       <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100">
                                       {{ $role->title }}
                                       </span>
                                       @else 
                                       <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-orange-800">
                                       {{ $role->title }}
                                       </span>
                                       @endif
                                       @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                       <div class="text-sm font-semibold text-gray-500">{{ $user->organisation }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       @if($user->active == 1)
                                       <span class="px-2 inline-flex text-xs font-semibold leading-5 font-semibold rounded-full bg-white text-gray-800">
                                       @if($user->last_login !== null)
                                       {{ $user->last_login->diffForHumans() }}
                                       @else
                                       Active
                                       @endif
                                       </span>
                                       @else
                                       <span class="px-2 inline-flex text-xs font-semibold leading-5 font-semibold rounded-full bg-white text-gray-800">
                                       @if($user->last_login !== null)
                                       Deactivated {{ $user->last_login->diffForHumans() }}
                                       @else
                                       Deactivated
                                       @endif
                                       </span>
                                       @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                       @can('user_access')
                                       <a href="{{  route('user.show', $user->id)  }}" class="inline-flex bg-white hover:bg-blue-600 text-gray-800 hover:text-white text-xs font-bold py-1 px-2 border border-gray-400 rounded shadow">Show</a>
                                       @endcan
                                       @can('user_edit')
                                       <a href="{{  route('user.edit', $user->id)  }}" class="inline-flex bg-white hover:bg-red-500 text-gray-800 hover:text-white text-xs font-bold py-1 px-2 border border-gray-400 rounded shadow">Modify</a>
                                       @endcan
                                       @can('user_delete')
                                       <form class="inline-block form-prevent-multiple-submits" id="form" action="{{  route('user.delete', $user->id)  }}" method="POST">
                                          <input type="hidden" name="_method" value="DELETE">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <button type="submit" class="bg-white hover:bg-red-600 text-gray-800 hover:text-white text-xs font-bold py-1 px-2 border border-gray-400 rounded shadow button-prevent-multiple-submits">Delete</button>
                                       </form>
                                       @endcan
                                    </td>
                                 </tr>
                                 @endforeach
                                 <!-- More items... -->
                              </tbody>
                           </table>
                           @else
                           <h2 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-700">
                              User Accounts
                           </h2>
                           <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                              <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                                 <h2 class="mb-6 font-extrabold text-gray-700 tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                    Opps, It looks like the account you are looking for has not been registered on our system yet
                                 </h2>
                                 <div class="mb-0 space-x-0 md:space-x-2">
                                    <p class="mt-1 max-w-2xl text-xs text-gray-600">
                                       If you just ran a search, click search icon again to return.
                                    </p>
                                 </div>
                              </div>
                           </section>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
      {!! $users->links() !!}
   </div>
</x-app-layout>
