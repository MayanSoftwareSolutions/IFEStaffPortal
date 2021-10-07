<div>
    <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
        @livewire('user-control-settings')
    </div>
    
    <div class="py-4 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-hidden">
                    <h2 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-700">
                       My Dashboard
                    </h2>
                    
                </div>
              
                 <div class="min-h-screen flex p-3">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-3 rounded-lg ">
                        @if($settings->user_profile_widget == true)
                        <div class="col-span-1 bg-gray-200 p-3 rounded">
                            @livewire('accounts-widget')
                        </div>
                        @endif

                         @if($settings->user_activity_log_widget == true) 
                        <div class="col-span-2 bg-gray-200 p-3 rounded">
                            @livewire('activity-widget')
                        </div> 
                        @endif
                    </div>
                 </div>
        
            </div>
        </div>
    </div>
</div>

