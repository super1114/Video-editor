<header  class="pb-36 lg:pb-24 bg-gradient-to-r from-light-blue-800 to-cyan-500">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="flex items-center justify-center lg:justify-between">
            <div style="width: 90%;"></div>
            <div class="hidden md:ml-4 md:flex md:items-center md:py-5 md:pr-0.5 w-1/8">
                <!-- Profile dropdown -->
                <div class="ml-4 relative flex-shrink-0 float-right">

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>
                                    <img src="{{ asset('img/default_avatar.png') }}" class="rounded-full" width="30" />
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            {{-- <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-dropdown-link>
                            </form> --}}
                            {{-- <div class="origin-top-right z-40 absolute -right-2 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu"> --}}
                                <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a> --}}
                                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a> --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-dropdown-link>
                                </form>
                            {{-- </div> --}}
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
            
        </div>
    </div>
    
</header>
