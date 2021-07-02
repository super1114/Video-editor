<header  class="pb-36 lg:pb-24 bg-gradient-to-r from-light-blue-800 to-cyan-500">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="flex items-center justify-center lg:justify-between">
            <div style="width: 90%;"></div>
            <div class="hidden md:ml-4 md:flex md:items-center md:py-5 md:pr-0.5 w-1/8">
                <!-- Profile dropdown -->
                <div class="ml-4 relative flex-shrink-0 float-right z-50">
                    <div x-data="{ dropdownOpen: false }" class="relative">
                      <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white focus:outline-none">
                        <img src="{{ asset('img/default_avatar.png') }}" class="rounded-full" width="30" />
                      </button>

                      <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                      <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                        <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                          Settings
                        </a>
                        
                        <a class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white" onclick="event.preventDefault(); $('#logoutForm').submit()">
                          Sign Out
                        <form id="logoutForm" action="{{route('logout')}}" method="post" class="hidden">@csrf</form>
                        </a>
                      </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</header>
