@can('user_edit')
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modify Account') }}
        </h2>
    </x-slot>

    <div wire:loading.delay>
        <div id="loading-screen" class="w-full h-full fixed block top-0 left-0 bg-white opacity-75 z-50">
            <span class="text-green-500 opacity-75 top-1/2 my-0 mx-auto block relative w-0 h-0">
                <svg class="animate-spin -ml-1 mr-3 h-10 w-10 text-purple-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </span>
        </div>
    </div>
      
      <div class="max-w-7xl mt-8 mx-auto rounded-lg py-5 sm:px-3 lg:px-4">
         <div class="relative">
            <div class="absolute left-0">
            <h5 class="font-extrabold text-lg tracking-tight text-gray-700 ml-3 border-b border-gray-400">
               Edit Account Form
            </h5>
            </div>
               <div class="absolute right-0 block">
                  <a href="{{ route('users') }}" class="inset-y-0 right-0 bg-blue-600 hover:bg-purple-600 text-white font-bold text-xs py-2 px-4 rounded">Back to Accounts</a>
               </div>
        </div>
      </div>
      <br>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $pages[$currentPage]['heading'] }}</h3>
                            <p class="mt-1 text-sm text-gray-600">{{ $pages[$currentPage]['subheading'] }}</p>
                        </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            @if ($errors->isNotEmpty())
                                <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                    <strong class="font-bold">Oops!</strong>
                                    <span class="block sm:inline">There are some errors with your submission.</span>
                                </div>
                            @endif
                            <form wire:submit.prevent="submit">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        @if ($currentPage === 1)
                                            <div class="flex flex-col">
                                                
                                                <div class="w-full py-2">
                                                    <label for="name" class="block text-sm font-bold text-gray-700">Name</label>
                                                    <input wire:model.lazy="name" type="text" name="name" id="name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full text-gray-800 shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    @error('name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                </div>
    
                                                <div class="w-full py-2">
                                                    <label for="email" class="block text-sm font-bold text-gray-700">Email address</label>
                                                    <input wire:model.lazy="email" type="text" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full text-gray-800 shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    @error('email') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                </div>
    
                                                <div class="w-full py-2">
                                                    <label for="job_title" class="block text-sm font-bold text-gray-700">Job Title</label>
                                                    <input wire:model.lazy="job_title" type="text" name="job_title" id="job_title" autocomplete="job_title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full text-gray-800 shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    @error('job_title') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                </div>
    
                                                <div class="w-full py-2">
                                                    <label for="department" class="block text-sm font-bold text-gray-700">Department</label>
                                                    <input wire:model.lazy="department" type="text" name="department" id="department" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full text-gray-800 shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    @error('department') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                </div>
    
                                                <div class="w-full py-2">
                                                    <label for="organisation" class="block text-sm font-bold text-gray-700">Organisation</label>
                                                    <input wire:model.lazy="organisation" type="text" name="organisation" id="organisation" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full text-gray-800 shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    @error('organisation') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                </div>
    
                                            </div>
    
                                            @elseif ($currentPage === 2)
                                            <div class="flex flex-col">
                                               
                                                <div class="w-full py-2">
                                                    <label for="role" class="block text-sm font-bold text-gray-700">Roles and Permissions</label>
                                                    <p class="font-bold text-gray-500">{{ $user->name }}'s has been assigned the {{ $findRole->title }} permissions</p>
                                                    <select name="role" wire:model="role" id="role" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full text-gray-800 text-sm">
                                                        <option value="">Leave Unchanged as {{ $findRole->title }} </option>
                                                        @foreach($selectedRole as $id => $roles)
                                                        <option value="{{ $id }}">{{ $roles }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('role') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            @endif
                                    </div>
                                    <div class="flex items-center justify-between px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        @if ($currentPage === 1)
                                            <div></div>
                                        @else
                                            <button wire:click="goToPreviousPage" type="button" class="inline-flex justify-center inset-y-0 right-0 bg-gray-500 hover:bg-gray-800 text-white font-bold text-xs py-2 px-4 rounded">
                                                Back
                                            </button>
                                        @endif
                                        @if ($currentPage === count($pages))
                                            <button type="submit" class="inline-flex justify-center inset-y-0 right-0 bg-blue-600 hover:bg-green-600 text-white font-bold text-xs py-2 px-4 rounded">
                                                Submit
                                            </button>
                                        @else
                                            <button wire:click="goToNextPage" type="button" class="inline-flex justify-center inset-y-0 right-0 bg-blue-600 hover:bg-purple-600 text-white font-bold text-xs py-2 px-4 rounded">
                                                Next
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
</div>
@else
<div class="max-w-7xl mt-10 mx-auto rounded-xl py-5 sm:px-3 lg:px-4 bg-white dark:bg-gray-800 overflow-hidden relative">
    <div class="text-start w-1/2 py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
        <h2 class="text-3xl font-extrabold text-black dark:text-white sm:text-4xl">
            <span class="block">
                You shouldn't be here !
            </span>
            <br>

            <span class="block text-red-500">
                Access Denied..
            </span>
        </h2>
        <p class="text-xl mt-4 text-gray-400">
            You do not have sufficient permissions to visit this section of the application. Please click the button below to return home 
        </p>
        <br>
        <div class="items-center justify-center lg:mt-0 lg:flex-shrink-0">
            <div class="mt-12 inline-flex rounded-md shadow">
                <a href="{{ route('dashboard') }}" class="py-4 px-6  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                   Go Back Home
                </a>
            </div>
        </div>
    </div>
    <img src="/images/object/1.png" class="absolute h-full max-w-1/2 hidden lg:block right-0 top-0"/>
</div>
@endcan
