<div>
        <div class="rounded-lg shadow-lg w-full md:w-full p-4 bg-white dark:bg-gray-800 overflow-hidden">
            <div class="w-full items-center justify-center mb-8">
            <p class="text-gray-800 dark:text-white text-lg font-normal"> 
                My Activity 
            </p>
            </div> 
        @if(count($activity) < 1) 
        <div class="flex items-start mb-6 rounded justify-between">
            <span class="rounded-full text-white dark:text-gray-800 p-2 bg-green-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
              </svg>
            </span>
            <div class="flex items-center w-full justify-between">
                <div class="flex text-sm flex-col w-full ml-2 items-start justify-between">
                <p class="block text-xs font-semibold text-gray-700"> Opps... It looks like there has been no recent activity on this account. </p>
                <p class="text-purple-500 text-xs"> Activity within the last 7 days is shown here. You can turn off activity using the settings icon in the top right hand corner. </p>
                </div>
            </div>
        </div> 
      @else 
      @foreach($activity as $log) 
      <div class="flex items-start mb-6 rounded justify-between">
        <span class="rounded-full text-white dark:text-gray-800 p-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
          </svg>
        </span>
        <div class="flex items-center w-full justify-between">
          <div class="flex text-sm flex-col w-full ml-2 items-start justify-between">
            <p class="block text-xs font-semibold text-gray-700">
              <span class="font-bold mr-1"> You </span>
              {{ $log->description }} a {{ $log->log_name }} which was saved in our databases on the {{ $log->created_at->format('j F, Y') }}. Any further updates from others will not be shown here.
            </p>
            <p class="text-purple-500 text-xs">
              {{ $log->created_at->diffForHumans() }}
            </p>
          </div>
        </div>
      </div> 
      @endforeach 
      <div class="bg-white w-full mx-auto m-1 p-4">
        <div>
          {{ $activity->links() }}
        </div>
      </div> 
      @endif
</div>