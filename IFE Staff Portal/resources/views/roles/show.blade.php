<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $role->title }} Profile
       </h2>
    </x-slot>
    <div>
       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="block mb-8">
           <a href="{{ route('roles') }}" class="inset-y-0 right-0 bg-blue-600 hover:bg-purple-600 text-white font-bold text-xs py-2 px-4 rounded">Back to Roles & Permissions</a>
         </div>

         <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                  <h2 class="ml-2 font-extrabold tracking-tight text-gray-900">
                    Profile Permissions
                 </h2>
                </div>
                        <div class="border-t border-gray-200">
                            <div class="shadow overflow-hidden border-b border-gray-200">
                                <div class="px-1 py-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-6 lg:px-2 lg:py-5">
                                    <div class="pr-3 pl-3 grid max-w-full gap-5 row-gap-3 sm:row-gap-5 lg:max-w-full lg:grid-cols-4 sm:mx-auto">

                                      <div class="flex flex-col justify-between p-5 bg-white border rounded shadow-sm">
                                        <div class="mb-1">
                                          <div class="flex items-center justify-between pb-3 mb-1 border-b">
                                            <div>
                                              <p class="text-xs font-bold tracking-wider uppercase">
                                                Permissions
                                              </p>
                                              <p class="text-sm font-extrabold">User Accounts</p>
                                            </div>
                                            <div class="flex items-center justify-center w-24 h-24 rounded-full bg-blue-gray-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="30px" height="30px" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                  </svg>
                                            </div>
                                          </div>
                                          <div>
                                            <p class="mb-1 font-bold tracking-wide text-xs">Features</p>
                                            <ul class="space-y-2">
                                                @foreach($role->permissions as $rolePermission)
                                                @if($rolePermission->area == 'Users')
                                              <li class="flex items-center text-xs">
                                                <div class="mr-2">
                                                  <svg class="w-4 h-4 text-green-500" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                                                    <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                                                    <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                                                  </svg>
                                                </div>
                                                <p class="font-medium text-gray-800">{{ $rolePermission->description}}</p>
                                              </li>
                                              @endif
                                              @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="flex flex-col justify-between p-5 bg-white border rounded shadow-sm">
                                        <div class="mb-1">
                                          <div class="flex items-center justify-between pb-3 mb-1 border-b">
                                            <div>
                                              <p class="text-xs font-bold tracking-wider uppercase">
                                                Permissions
                                              </p>
                                              <p class="text-sm font-extrabold">Permissions</p>
                                            </div>
                                            <div class="flex items-center justify-center w-24 h-24 rounded-full bg-blue-gray-50">
                                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="30px" height="30px"viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                                  </svg>
                                            </div>
                                          </div>
                                          <div>
                                            <p class="mb-1 font-bold tracking-wide text-xs">Features</p>
                                            <ul class="space-y-2 text-xs">
                                                @foreach($role->permissions as $rolePermission)
                                                @if($rolePermission->area == 'Permissions')
                                              <li class="flex items-center">
                                                <div class="mr-2">
                                                  <svg class="w-4 h-4 text-green-500" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                                                    <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                                                    <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                                                  </svg>
                                                </div>
                                                <p class="font-medium text-gray-800">{{ $rolePermission->description}}</p>
                                              </li>
                                              @endif
                                              @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="flex flex-col justify-between p-5 bg-white border rounded shadow-sm">
                                        <div class="mb-1">
                                          <div class="flex items-center justify-between pb-3 mb-1 border-b">
                                            <div>
                                              <p class="text-xs font-bold tracking-wider uppercase">
                                                Permissions
                                              </p>
                                              <p class="text-sm font-extrabold">Configuration</p>
                                            </div>
                                            <div class="flex items-center justify-center w-24 h-24 rounded-full bg-blue-gray-50">
                                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="30px" height="30px"viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                                  </svg>
                                            </div>
                                          </div>
                                          <div>
                                            <p class="mb-1 font-bold tracking-wide text-xs">Features</p>
                                            <ul class="space-y-2 text-xs">
                                                @foreach($role->permissions as $rolePermission)
                                                @if($rolePermission->area == 'Configuration')
                                              <li class="flex items-center">
                                                <div class="mr-2">
                                                  <svg class="w-4 h-4 text-green-500" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                                                    <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                                                    <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                                                  </svg>
                                                </div>
                                                <p class="font-medium text-gray-800">{{ $rolePermission->description}}</p>
                                              </li>
                                              @endif
                                              @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                            </div>
                     </div>
                </div>
            </div>
          <br>
       <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
           <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                 <div class="flex flex-col">
                    <div class="-my-2 bg-white overflow-x-auto sm:-mx-6 lg:-mx-8">
                       <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="px-4 py-5 sm:px-6">
                          <h2 class="ml-2 font-extrabold tracking-tight text-gray-900">
                            Account with {{ $role->title }} profile
                         </h2>
                        </div>
                          <div class="shadow overflow-hidden border-b border-t border-gray-200">
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
                                         Organisation
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                     </th>
                                   </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                   @foreach ($profile_users as $profile_user)
                                   <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                           <div class="ml-1">
                                              <div class="text-sm font-medium text-gray-900">
                                                 {{ $profile_user->name }}
                                              </div>
                                              <div class="text-sm text-gray-500">
                                                 {{ $profile_user->email }}
                                              </div>
                                           </div>
                                        </div>
                                     </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                         <div class="text-sm text-gray-900">{{ $profile_user->job_title }}</div>
                                         <div class="text-sm text-gray-500">{{ $profile_user->department }}</div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                         <div class="text-sm text-gray-500">{{ $profile_user->organisation }}</div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('user.show', $profile_user->id) }}" class="inline-flex bg-white hover:bg-blue-600 text-gray-800 hover:text-white text-xs font-bold py-1 px-2 border border-gray-400 rounded shadow">Show</a>
                                        <a href="{{ route('user.edit', $profile_user->id) }}" class="inline-flex bg-white hover:bg-red-500 text-gray-800 hover:text-white text-xs font-bold py-1 px-2 border border-gray-400 rounded shadow">Modify</a>
                                   </tr>
                                   @endforeach
                                   <!-- More items... -->
                                </tbody>
                             </table>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <br>
          {!! $profile_users->links() !!}
  </div>
    </div>
</div>
 </x-app-layout>