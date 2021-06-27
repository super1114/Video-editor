<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TCL Demo Hires</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

        <!-- Icons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    </head>
    <body class="antialiased">

        <div class="min-h-screen bg-gray-100">
            <header class="pb-24 bg-gradient-to-r from-light-blue-800 to-cyan-500">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="relative flex flex-wrap items-center justify-center lg:justify-between">
                <!-- Logo -->
                <div class="absolute left-0 py-5 flex-shrink-0 lg:static">
                    <a href="/dash">
                    <span class="sr-only">TCL Tankers</span>
                    <!-- https://tailwindui.com/img/logos/workflow-mark-cyan-200.svg -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    height="60px" viewBox="0 0 259 123.5" style="enable-background:new 0 0 259 123.5;" xml:space="preserve">
               <path style="fill:#FFFFFF;" d="M245.7,85.4c0-0.7-0.1-1.2-0.2-1.7c-0.1-0.5-0.4-0.9-0.7-1.2c-0.3-0.3-0.7-0.5-1.2-0.7
                   c-0.5-0.1-1.1-0.2-1.8-0.2c-0.7,0-1.3,0.1-1.8,0.2c-0.5,0.1-0.9,0.4-1.2,0.7c-0.3,0.3-0.5,0.7-0.7,1.2c-0.1,0.5-0.2,1-0.2,1.7v1.9
                   h7.7V85.4z M237.2,85c0-1.4,0.4-2.5,1.2-3.2c0.8-0.7,1.9-1.1,3.4-1.1c1.5,0,2.7,0.4,3.4,1.1c0.8,0.7,1.1,1.8,1.2,3.2v3.2h-9.2V85z
                    M237.2,89.1h0.8v3.2h8.5v0.9h-8.5v3.2h-0.8V89.1z M237.2,100.3h8.5v-5.2h0.8v6.1h-9.2V100.3z"/>
               <path style="fill:#FFFFFF;" d="M220.4,101.2h12.9v-1.1h-11.6V80.7h-1.3V101.2z M205.3,93.6l4.6-11.6h0.1l4.4,11.6H205.3z M201,101.2
                   h1.4l2.6-6.6h9.8l2.6,6.6h1.4l-8.1-20.5h-1.4L201,101.2z M195.6,81.8v19.4h1.3V81.8h7.2v-1.1h-15.7v1.1H195.6z M170.8,101.2h1.3v-19
                   h0.1l13,19h1.5V80.7h-1.3v18.8h-0.1l-13-18.8h-1.6V101.2z M154.8,101.2h13.9v-1.1H156v-9h11.8V90H156v-8.2h12.5v-1.1h-13.8V101.2z
                    M137.7,90.8v-9h7.3c0.7,0,1.4,0.1,2,0.2s1.2,0.4,1.7,0.7c0.5,0.3,0.9,0.8,1.1,1.3c0.3,0.5,0.4,1.2,0.4,2c0,0.8-0.1,1.5-0.4,2.1
                   c-0.3,0.6-0.6,1.1-1.1,1.5c-0.5,0.4-1,0.7-1.7,0.8c-0.6,0.2-1.3,0.3-2.1,0.3H137.7z M136.4,101.2h1.3v-9.3h7.3
                   c1.2,0,2.1,0.2,2.8,0.5c0.7,0.3,1.1,0.8,1.5,1.3c0.3,0.5,0.5,1.1,0.5,1.8c0.1,0.7,0.1,1.4,0.1,2.1c0,0.7,0,1.4,0,2
                   c0,0.6,0.2,1.2,0.4,1.7h1.4c-0.2-0.2-0.3-0.4-0.4-0.7c-0.1-0.3-0.1-0.6-0.2-0.9c0-0.3-0.1-0.7-0.1-1.1v-1.2c0-0.7,0-1.3-0.1-2
                   c-0.1-0.7-0.2-1.3-0.5-1.8c-0.3-0.6-0.7-1-1.2-1.4c-0.5-0.4-1.3-0.6-2.2-0.7v-0.1c1.4-0.2,2.5-0.8,3.2-1.8c0.8-0.9,1.2-2.1,1.2-3.5
                   c0-1-0.2-1.8-0.5-2.5c-0.3-0.7-0.8-1.2-1.4-1.6s-1.3-0.7-2.1-0.9c-0.8-0.2-1.6-0.3-2.5-0.3h-8.6V101.2z"/>
               <path style="fill:#FFFFFF;" d="M221.3,62.2v-9h7.3c0.7,0,1.3,0.1,2,0.2c0.6,0.2,1.2,0.4,1.7,0.7c0.5,0.3,0.9,0.8,1.1,1.3
                   c0.3,0.5,0.4,1.2,0.4,2c0,0.8-0.1,1.5-0.4,2.1c-0.3,0.6-0.6,1.1-1.1,1.5c-0.5,0.4-1,0.7-1.7,0.8c-0.6,0.2-1.3,0.3-2.1,0.3H221.3z
                    M220,72.6h1.3v-9.3h7.3c1.2,0,2.1,0.2,2.8,0.5c0.7,0.3,1.1,0.8,1.5,1.3c0.3,0.5,0.5,1.1,0.5,1.8c0.1,0.7,0.1,1.4,0.1,2.1
                   c0,0.7,0,1.4,0,2c0,0.6,0.2,1.2,0.4,1.7h1.4c-0.2-0.2-0.3-0.4-0.4-0.7c-0.1-0.3-0.1-0.6-0.2-0.9c0-0.3-0.1-0.7-0.1-1.1v-1.2
                   c0-0.7,0-1.3-0.1-2c-0.1-0.7-0.2-1.3-0.5-1.8c-0.3-0.6-0.7-1-1.2-1.4c-0.5-0.4-1.3-0.6-2.2-0.7v-0.1c1.4-0.2,2.5-0.8,3.2-1.8
                   c0.8-0.9,1.2-2.1,1.2-3.5c0-1-0.2-1.8-0.5-2.5c-0.3-0.7-0.8-1.2-1.4-1.6c-0.6-0.4-1.3-0.7-2.1-0.9c-0.8-0.2-1.6-0.3-2.5-0.3H220
                   V72.6z M204,72.6h13.9v-1.1h-12.7v-9H217v-1.1h-11.8v-8.2h12.5v-1.1H204V72.6z M186,72.6h1.3v-7.2l4.3-3.9l9.3,11.1h1.6l-9.9-12
                   l9.4-8.5h-1.6l-12.9,11.8V52.1H186V72.6z M166.3,72.6h1.3v-19h0.1l13,19h1.5V52.1h-1.3v18.8h-0.1l-13-18.8h-1.6V72.6z M151.2,65
                   l4.6-11.6h0.1l4.4,11.6H151.2z M146.8,72.6h1.4l2.6-6.6h9.8l2.6,6.6h1.4l-8.1-20.5h-1.4L146.8,72.6z M141.4,53.2v19.4h1.3V53.2h7.2
                   v-1.1h-15.7v1.1H141.4z"/>
               <path style="fill:#FFFFFF;" d="M179.7,23.5v16.7h10V44h-14.5V23.5H179.7z M167,29c-0.3-0.4-0.6-0.8-1-1.1c-0.4-0.3-0.9-0.6-1.4-0.8
                   c-0.5-0.2-1-0.3-1.6-0.3c-1,0-1.9,0.2-2.6,0.6c-0.7,0.4-1.3,0.9-1.7,1.6c-0.4,0.7-0.8,1.4-1,2.3c-0.2,0.8-0.3,1.7-0.3,2.6
                   c0,0.9,0.1,1.7,0.3,2.5c0.2,0.8,0.5,1.5,1,2.2c0.4,0.7,1,1.2,1.7,1.6c0.7,0.4,1.6,0.6,2.6,0.6c1.4,0,2.5-0.4,3.2-1.3
                   c0.8-0.8,1.2-2,1.4-3.3h4.4c-0.1,1.3-0.4,2.4-0.9,3.5c-0.5,1-1.1,1.9-1.9,2.6s-1.7,1.3-2.8,1.7c-1.1,0.4-2.2,0.6-3.5,0.6
                   c-1.6,0-3-0.3-4.2-0.8c-1.3-0.5-2.3-1.3-3.2-2.3c-0.9-1-1.5-2.1-2-3.4c-0.5-1.3-0.7-2.7-0.7-4.2c0-1.5,0.2-3,0.7-4.3
                   c0.5-1.3,1.1-2.5,2-3.4c0.9-1,1.9-1.7,3.2-2.3c1.3-0.6,2.7-0.8,4.2-0.8c1.1,0,2.2,0.2,3.2,0.5c1,0.3,1.9,0.8,2.7,1.4
                   c0.8,0.6,1.5,1.4,2,2.3c0.5,0.9,0.8,2,1,3.2h-4.4C167.4,29.9,167.2,29.4,167,29 M135,27.3v-3.8h16.8v3.8h-6.1V44h-4.5V27.3H135z"/>
               <g>
                   <path style="fill:#FFFFFF;" d="M61,0.8C27.1,0.8-0.4,28.2-0.4,62.1c0,33.9,27.5,61.4,61.4,61.4c33.9,0,61.4-27.5,61.4-61.4
                       C122.3,28.2,94.8,0.8,61,0.8z M47.6,106.8c-19.4-5.7-33.3-23.6-33.3-44.7c0-8.2,2.2-15.9,5.9-22.5L32.3,47
                       c-2.4,4.5-3.8,9.7-3.8,15.1c0,13.2,8.1,24.5,19.1,29.6V106.8z M61,108.8c-2.3,0-4.6-0.3-6.8-0.6v-1.6V93.8V30.4
                       c-7,1.6-13.7,5.6-18.3,11.1l-12.2-7.4c8.5-11.3,22-18.6,37.3-18.6c15.1,0,28.5,7.2,37,18.3l-10.8,9.3C82.8,37,76.2,32.5,68.7,30.6
                       v63C81.9,90.4,92,78.9,93.2,65.2h14.2C106,89.5,85.7,108.8,61,108.8z"/>
               </g>
               </svg>
                    </a>
                </div>

                <!-- Right section on desktop -->
                <div class="hidden lg:ml-4 lg:flex lg:items-center lg:py-5 lg:pr-0.5">
                    <button type="button" class="flex-shrink-0 p-1 text-cyan-200 rounded-full hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="ml-4 relative flex-shrink-0">


                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>
                                        {{-- {{ Auth::user()->name }} --}}
                                            <span class="sr-only">Open user menu</span>
                                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                                    </div>

                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                {{-- <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-dropdown-link>
                                </form> --}}
                                {{-- <div class="origin-top-right z-40 absolute -right-2 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu"> --}}
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                                {{-- </div> --}}
                            </x-slot>
                        </x-dropdown>




                    <!--
                        Profile dropdown panel, show/hide based on dropdown state.

                        Entering: ""
                        From: ""
                        To: ""
                        Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->

                    </div>
                </div>

                <div class="w-full py-5 lg:border-t lg:border-white lg:border-opacity-20">
                    <div class="lg:grid lg:grid-cols-3 lg:gap-8 lg:items-center">
                    <!-- Left nav -->
                    <div class="hidden lg:block lg:col-span-2">
                        <nav class="flex space-x-4">
                        <a href="/dash" class="text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="page">
                            Home
                        </a>

                        <a href="#" class="text-cyan-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="false">
                            Hires
                        </a>

                        <a href="#" class="text-cyan-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="false">
                            Fleet
                        </a>

                        <a href="#" class="text-cyan-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="false">
                            Customers
                        </a>

                        <a href="#" class="text-cyan-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="false">
                            Activities
                        </a>
                        </nav>
                    </div>
                    <div class="px-12 lg:px-0">
                        <!-- Search -->
                        <div class="max-w-xs mx-auto w-full lg:max-w-md">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative text-white focus-within:text-gray-600">
                            <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                            <!-- Heroicon name: search -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                            </div>
                            <input id="search" class="block w-full text-white bg-white bg-opacity-20 py-2 pl-10 pr-3 border border-transparent rounded-md leading-5 focus:text-gray-900 placeholder-white focus:outline-none focus:bg-opacity-100 focus:border-transparent focus:placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search">
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Menu button -->
                <div class="absolute right-0 flex-shrink-0 lg:hidden">
                    <!-- Mobile menu button -->
                    <button @click.prevent="showMenu = !showMenu " class="bg-transparent p-2 rounded-md inline-flex items-center justify-center text-cyan-200 hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                        Heroicon name: menu

                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                        Heroicon name: x

                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    </button>
                </div>
                </div>
            </div>
            <div x-data="{showMenu : false}" class="bg-white shadow-sm">
                <!--
                    Mobile menu overlay, show/hide based on mobile menu state.

                    Entering: "duration-150 ease-out"
                    From: "opacity-0"
                    To: "opacity-100"
                    Leaving: "duration-150 ease-in"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div x-show="showMenu" class="hidden z-20 fixed inset-0 bg-black bg-opacity-25 lg:hidden" aria-hidden="true"></div>

                <!--
                    Mobile menu, show/hide based on mobile menu state.

                    Entering: "duration-150 ease-out"
                    From: "opacity-0 scale-95"
                    To: "opacity-100 scale-100"
                    Leaving: "duration-150 ease-in"
                    From: "opacity-100 scale-100"
                    To: "opacity-0 scale-95"
                -->
                <div x-show="showMenu" class="hidden z-30 absolute top-0 inset-x-0 max-w-3xl mx-auto w-full p-2 transition transform origin-top lg:hidden">
                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
                    <div class="pt-3 pb-2">
                        <div class="flex items-center justify-between px-4">
                        <div>
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-cyan-600.svg" alt="Workflow">
                        </div>
                        <div class="-mr-2">
                            <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            </button>
                        </div>
                        </div>
                        <div class="mt-3 px-2 space-y-1">
                        <a href="/dash" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Home</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Hires</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Fleet</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Customers</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Activities</a>
                        </div>
                    </div>
                    <div class="pt-4 pb-2">
                        <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                        </div>
                        <div class="ml-3 min-w-0 flex-1">
                            <div class="text-base font-medium text-gray-800 truncate">Rachel Mathews</div>
                            <div class="text-sm font-medium text-gray-500 truncate">rachel@tclui.snappy.io</div>
                        </div>
                        <button class="ml-auto flex-shrink-0 bg-white p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                        </div>
                        <div class="mt-3 px-2 space-y-1">
                        <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Your Profile</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Settings</a>
                        <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Sign out</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </header>

            <main class="-mt-24 pb-8">
                <section aria-labelledby="hire-contract">
                {{-- content head --}}
                <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">

                    <div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
                        <h2 class="sr-only" id="profile-overview-title">Hires</h2>
                        <div class="bg-white p-6">
                          <div class="sm:flex sm:items-center sm:justify-between">
                            <div class="sm:flex sm:space-x-5">
                              <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
                                <p class="text-xl font-bold text-gray-900 sm:text-2xl">Hires</p>
                                <p class="text-sm font-medium text-gray-400">TCL Hires and Contract Status</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    {{-- end content head --}}

                    {{-- start table --}}
                    <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <ul class="divide-y divide-gray-200">
                        <li>
                            <a href="#" class="block hover:bg-gray-50">
                            <div class="flex items-center px-4 py-4 sm:px-6">
                                <div class="min-w-0 flex-1 flex items-center">
                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                    <div>
                                    <p class="text-base font-medium text-cyan-600">Milk Flow Limited</p>
                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                        <span class="font-semibold mr-1">Fleet:</span><span class="">FN1234</span><span class="font-semibold ml-4 mr-1">Contract:</span><span class="">00274</span>
                                    </p>
                                    </div>
                                    <div class="hidden md:block">
                                    <div>
                                        <p class="text-sm text-gray-900">
                                        Start
                                        <time class="ml-1 mr-12 text-gray-600" datetime="2020-01-07">7 Jan '21</time>
                                        End
                                        <time class="ml-1 text-gray-600" datetime="2020-01-07">7 Jan '22</time>
                                        </p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500">
                                        <!-- Heroicon name: solid/check-circle -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Contract
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-yellow-400 ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                          </svg>
                                        On Hire
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-red-200 ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                          </svg>
                                        Off Hire
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                </div>
                            </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="block hover:bg-gray-50">
                            <div class="flex items-center px-4 py-4 sm:px-6">
                                <div class="min-w-0 flex-1 flex items-center">
                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                    <div>
                                        <p class="text-base font-medium text-cyan-600">Oil Be Back Inc.</p>
                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                        <span class="font-semibold mr-1">Fleet:</span><span class="">FN1234</span><span class="font-semibold ml-4 mr-1">Contract:</span><span class="">00274</span>
                                    </p>
                                    </div>
                                    <div class="hidden md:block">
                                        <div>
                                            <p class="text-sm text-gray-900">
                                            Start
                                            <time datetime="2020-01-07">January 7, 2020</time>
                                            </p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                            <!-- Heroicon name: solid/check-circle -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            Contract
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400 ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            On Hire
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-red-200 ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                              </svg>
                                            Off Hire
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                </div>
                            </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="block hover:bg-gray-50">
                            <div class="flex items-center px-4 py-4 sm:px-6">
                                <div class="min-w-0 flex-1 flex items-center">
                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                    <div>
                                    <p class="text-base font-medium text-cyan-600">Eflowent Systems</p>
                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                        <span class="font-semibold mr-1">Fleet:</span><span class="">FN1234</span><span class="font-semibold ml-4 mr-1">Contract:</span><span class="">00274</span>
                                    </p>
                                    </div>
                                    <div class="hidden md:block">
                                        <div>
                                            <p class="text-sm text-gray-900">
                                            Start
                                            <time datetime="2020-01-07">January 7, 2020</time>
                                            </p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                            <!-- Heroicon name: solid/check-circle -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            Contract
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400 ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            On Hire

                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400 ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                              </svg>
                                            Off Hire
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                </div>
                            </div>
                            </a>
                        </li>
                        </ul>
                    </div>
                    {{-- end table --}}



                </div>
                </section>
            </main>
            <footer>
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
                <div class="border-t border-gray-200 py-8 text-sm text-gray-500 text-center sm:text-left"><span class="block sm:inline">&copy; 2021 TCL Tanker Rental LTD.</span> <span class="block sm:inline">All rights reserved.</span></div>
            </div>
            </footer>
        </div>


    </body>
</html>
