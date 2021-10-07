<div>
 <div class="flex flex-wrap right-0 ml-2 mt-3">
  <div>
    <details x-data x-ref="dropdown" @click.away="$refs.dropdown.removeAttribute('open');" class="relative inline-block text-left">
      <summary>
        <div class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-xs font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none" style="min-width:12rem">
          System Configuration
          <svg class="-mr-1 ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </summary>

      <details-menu role="menu" class="origin-top-right absolute right-0 mt-2 w-auto z-50 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">

        <div class="py-1" role="none">
          <form>
            @csrf
          <div class="block px-4 py-2 text-xs flex justify-between text-gray-700 font-semibold hover:bg-gray-100 hover:text-gray-900" role="menuitem" style="min-width:12rem">
            Profile Widget
            <div class="relative inline-block w-8 ml-4 align-middle select-none transition duration-200 ease-in">
              <input wire:click="change('user_profile_widget')" wire:model:="profile_widget" type="checkbox" name="profile_widget" value="{{ $profile_widget }}" class="focus:outline-none toggle-checkbox absolute block w-4 h4 rounded-full bg-white border-4 appearance-none cursor-pointer" @if ($profile_widget) checked="checked" @endif/>
              <label for="profile_widget" class="toggle_label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
            </div>

          </div>
          <div class="block px-4 py-2 text-xs flex justify-between text-gray-700 font-semibold hover:bg-gray-100 hover:text-gray-900" role="menuitem" style="min-width:12rem">
            Activity Widget
            <div class="relative inline-block w-8 ml-4 align-middle select-none transition duration-200 ease-in">
              <input wire:click="change('user_activity_log_widget')" wire:model:="activity_widget" type="checkbox" name="activity_widget" value="{{ $activity_widget }}" class="focus:outline-none toggle-checkbox absolute block w-4 h4 rounded-full bg-white border-4 appearance-none cursor-pointer" @if ($activity_widget) checked="checked" @endif/>
              <label for="activity_widget" class="toggle_label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
            </div>

          </div>
          <div class="block px-4 py-2 text-xs flex justify-between text-gray-700  font-semibold hover:bg-gray-100 hover:text-gray-900" role="menuitem" style="min-width:12rem">
            User Notifications
            <div class="relative inline-block w-8 ml-4 align-middle select-none transition duration-200 ease-in">
             <input wire:click="change('user_notifications')" wire:model:="user_notifications" type="checkbox" name="user_notifications" value="{{ $user_notifications }}" class="focus:outline-none toggle-checkbox absolute block w-4 h4 rounded-full bg-white border-4 appearance-none cursor-pointer" @if ($user_notifications) checked="checked" @endif/>
             <label for="user_notifications" class="toggle_label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
           </div>

          </div>
          </form>
        </div>
      </details-menu>
    </details>

  </div>
</div>

   @if (session()->has('message'))
    <div class="flex justify-between bg-white rounded bg-gray-100 m-1 overflow-hidden p-2 space-x-1" style="max-width:12rem">
      <div class="flex items-baseline"> 
          <span class="items-center justify-center p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            </span> 
        </div>
      <div class="flex flex-grow items-center">
        <p class="leading-tight text-center text-xs md:text-sm"> {{ session('message') }} </p>
      </div>
    </div>
  @endif

<style>
summary {
    list-style-type: none;
}

summary::-webkit-details-marker {
    display: none;
}

.toggle-checkbox:checked {
 @apply: right-0;
 right: 0;
 border-color: #68D391;
}
.toggle-checkbox:checked + .toggle-label {
 @apply: bg-green-400;
 background-color: #68D391;
}

</style>
</div>
