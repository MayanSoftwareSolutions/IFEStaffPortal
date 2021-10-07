<div>
    <div class="rounded-lg shadow-lg inline-block flex-1 w-full overflow-hidden transform transition-all sm:align-middle">
          <div class="rounded-xl p-2 bg-white shadow-lg">
            <div class="p-8 h-full">
              <div class="text-center mb-4 opacity-90">
                <a class="block relative">
                  <img alt="profil" src="{{ $user->profile_photo_url }}" class="mx-auto object-cover rounded-full h-20 w-20 " />
                </a>
              </div>
              <div class="text-center">
                <p class="text-lg text-gray-800 dark:text-white">
                  {{ $user->name }}
                </p>
                <p class="text-lg text-gray-500 dark:text-gray-200 font-light">
                  {{ $user->job_title }}
                </p>
                <p class="text-md text-gray-500 dark:text-gray-400 max-w-xs py-4 font-light">
                  {{ $user->email }}
                </p>
              </div>
            </div>
            <div class="bg-white items-center justify-center px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse rounded-b-lg">
              <a href="{{ route('profile.show') }}" class="w-full font-semibold inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"> Account Settings </a>
            </div>
          </div>
        </div>

</div>