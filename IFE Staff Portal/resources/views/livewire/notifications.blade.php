<div>
@if($countNotifications > 0)
    <div class="relative inline-block text-left outline-none mr-4" x-data="{open:false}">
        <div class="shadow-none outline-none focus:outline-none">
            <button @click="open = true" type="button" class="bg-white dark:bg-gray-800 flex items-center justify-center w-full rounded-md px-4 py-2 text-sm font-medium text-gray-700" id="options-menu" >
                <p class="font-medium text-xs mr-2 text-gray-700 dark:text-white">
                    <p class="font-bold text-xs mr-2 border-gray-200 text-red-500 dark:text-white">
                        <span class="relative inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-900 h-6 w-6 animate-wiggle" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        <span class="absolute opacity-75 top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-blue-700 rounded-full">{{ $countNotifications }}</span>
                        </span>
                    </p>
                </p>
            </button>
        </div>
        <div x-show="open" @click.away="open=false" x-transition:enter-start="transition ease-in duration-3000" class="absolute z-10 -ml-4 mt-3 transform bg-transparent px-2 sm:px-0 lg:ml-0 lg:left-0 lg:-translate-x-3/4">

            <div class="shadow-none rounded-lg bg-white mx-auto m-1 p-4 mr-2 notification-box flex">
                <div>
                <div class="text-sm text-gray-900 font-bold float-left">
                    My Notifications 
                </div>
                </div>
            </div>

            @foreach($notifications as $notification)
            <div class="shadow-lg rounded-lg bg-gray-100 mx-auto m-2 p-4 mr-2 notification-box flex">
                @foreach($notification->data['notify'] as $messages)
                <div class="pr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </div>
                <div>
                <div class="text-xs font-semibold pb-2">
                    Recieved {{ $notification->created_at->diffForHumans() }}
                    <a wire:click.prevent="markNotificationAsRead('{{ $notification->id }}')" href="#">
                    <span class="float-right">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 hover:animate-ping hover:text-green-700 hover:animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    </a>
                </div>
                <div class="text-xs font-semibold text-gray-600  tracking-tight ">
                    {{ $messages }}
                </div>
                
                </div>
                @endforeach
            </div>
            @endforeach


            <div class="rounded-lg 
            @if($countNotifications > 3) bg-gray-50 shadow-lg @else bg-transparent @endif mx-auto m-1 p-4 notification-box flex">
                <div>
                <div class="text-xs">
                    {{ $notifications->links() }}
                </div>
                </div>
            </div>

            <style>
            .notification-box {
                width:20rem;
                }
            </style>

        </div>
    </div>
@endif
</div>

