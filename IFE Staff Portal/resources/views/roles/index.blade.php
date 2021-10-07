<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Roles and Permissions') }}
       </h2>
    </x-slot>

    <div id="loading-screen" class="prevent-double hidden w-full h-full fixed block top-0 left-0 bg-white opacity-75 z-50">
      <span class="text-green-500 opacity-75 top-1/2 my-0 mx-auto block relative w-0 h-0">
         <svg class="animate-spin -ml-1 mr-3 h-10 w-10 text-purple-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
          </svg>
      </span>
    </div>

    <div class="max-w-7xl mt-8 mx-auto rounded-lg py-5 sm:px-3 lg:px-4">
       <div class="block mb-1">
          @can('role_create')
          <a href="{{ route('role.create') }}" class="inset-y-0 right-0 bg-green-600 hover:bg-green-700 text-white font-bold text-xs py-2 px-4 rounded">Create Role</a>
          @endcan
          <a href="{{ route('users') }}" class="inset-y-0 right-0 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs py-2 px-4 rounded">System Accounts</a>
          
          @csrf
          <form action="#" method="GET" role="search">
             <div class="font-sans mt-4 text-grey-600 bg-gray-100 flex rounded-xl">
                <div class="border rounded overflow-hidden flex">
                   <input type="text" class="px-4 py-2 text-sm border-transparent rounded-lg text-gray-500" name="title" placeholder="Search Roles">
                   <button class="flex items-center justify-center px-4 border-lg">
                      @if($roles->count() < 2)
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
          <br>
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
          <br>
          @endif  

         <div id="role_data" class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
               <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg">
                     <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                           <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                              <div class="shadow overflow-hidden border-b border-gray-200">
                                 @if (count($roles) > 0)
                                 <h2 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-900">
                                    Roles and Permissions
                                 </h2>
                              </div>
                              <table class="min-w-full divide-y divide-gray-200">
                                 <thead class="bg-gray-50">
                                    <tr>
                                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Title
                                       </th>
                                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Created
                                       </th>
                                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Last updated
                                       </th>
                                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          No of System Permissions
                                       </th>
                                       <th scope="col" class="relative px-6 py-3">
                                          <span class="sr-only">Options</span>
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($roles as $role)
                                    <tr>
                                       <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm font-semibold text-gray-900">{{ $role->title }}</div>
                                       </td>
                                       <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                          <div class="text-xs font-semibold text-gray-900">
                                             @if($role->created_at != null)
                                             {{ $role->created_at->format('j F, Y') }}
                                             @else
                                             System Generated Profile
                                             @endif
                                             </div>
                                       </td>
                                       <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-xs font-semibold text-gray-500">
                                             @if($role->updated_at != null)
                                             {{ $role->updated_at->diffForHumans() }}
                                             @else
                                             Not Updated Since Creation
                                             @endif
                                             </div>
                                       </td>
                                       <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-xs font-semibold text-green-500">
                                             {{ $role->permissions()->count()}} Permissions Assigned
                                          </div>
                                       </td>
                                       <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                          @can('role_access')
                                          <a href="{{  route('role.show', $role->id)  }}" class="inline-flex bg-white hover:bg-blue-600 text-gray-800 hover:text-white text-xs font-bold py-1 px-2 border border-gray-400 rounded shadow">Show</a>
                                          @endcan
                                          @can('role_edit')
                                          <a href="{{  route('role.edit', $role->id)  }}" class="inline-flex bg-white hover:bg-red-500 text-gray-800 hover:text-white text-xs font-bold py-1 px-2 border border-gray-400 rounded shadow">Modify</a>
                                          @endcan
                                          @can('role_delete')
                                          <form class="inline-block form-prevent-multiple-submits" action="{{ route('role.delete', $role->id) }}" method="POST">
                                             <input type="hidden" name="_method" value="DELETE">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                             <button type="submit" class="bg-white hover:bg-red-600 text-gray-800 hover:text-white text-xs font-bold py-1 px-2 border border-gray-400 rounded shadow button-prevent-multiple-submits">
                                                Delete
                                             </button>
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
                                 Roles and Permissions
                              </h2>
                              <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                                 <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                                    <h2 class="mb-6 font-extrabold text-gray-700 tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                       Opps, It looks like the role you are looking for has not been created yet
                                    </h2>
                                    <div class="mb-0 space-x-0 md:space-x-2">
                                       <p class="mt-1 max-w-2xl text-xs text-gray-600">
                                          If you just ran a search, click x icon again to return.
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
       {!! $roles->links() !!}
    </div>
 </x-app-layout>
 