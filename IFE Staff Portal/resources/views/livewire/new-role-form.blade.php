@can('user_create')
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Role') }}
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
               New Role Profile Form
            </h5>
            </div>
               <div class="absolute right-0 block">
                  <a href="{{ route('roles') }}" class="inset-y-0 right-0 bg-blue-600 hover:bg-purple-600 text-white font-bold text-xs py-2 px-4 rounded">Back to Role & Permissions</a>
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
                            @if (session()->has('message'))
                            <div class="text-sm bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="font-bold block sm:inline">{{ session('message') }}</span>
                            </div>
                            @endif
                            <form wire:submit.prevent="submit">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        @if ($currentPage === 1)
                                            <div class="flex flex-col">
                                                
                                                <div class="w-full py-2">
                                                    <label for="title" class="block text-sm font-bold text-gray-700">Profile Title</label>
                                                    <input wire:model.lazy="title" type="text" name="title" id="title" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    @error('title') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                </div>

                                            </div>

                                            @elseif ($currentPage === 2)
                                            <div class="flex flex-col">
                                                <div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-6">
                                                    <label for="title" class="block font-medium text-sm text-gray-700 mb-2 ">System Permissions</label>
                                                    <div class="block mb-8">
                                                        <div class="flex flex-row flex-wrap">
                                                            @foreach($selectedPermissions as $value)
                                                            <label class="inline-flex bg-white hover:bg-purple-600 text-sm mt-2 mb-2 mr-2 font-semibold py-1 px-2 border border-gray-400 rounded shadow-sm">
                                                              <input type="checkbox" wire:model="permissions" name="permissions[]" id="permission" value="{{ $value->id }}" class="form-checkbox h-5 w-5 rounded-xl text-blue-600" >
                                                              <span class="ml-2 text-gray-800 hover:text-white">{{ $value->description }}</span>
                                                            </label>
                                                            @endforeach
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

