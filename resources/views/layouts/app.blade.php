<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VIDEO EDITOR</title>

    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components-v2.css') }}" rel="stylesheet">
    
    
    <!-- <link href="{{ asset('css/home.css') }}" rel="stylesheet"> -->



    
    <style>
      input[type=range]::-webkit-slider-thumb {
      pointer-events: all;
      width: 24px;
      height: 24px;
      -webkit-appearance: none;
      /* @apply w-6 h-6 appearance-none pointer-events-auto; */
      }
    </style> 
    @yield('styles')
</head>
<body class="min-h-screen bg-gray-50">
    <div id="app">
        @include('layouts.nav')
        @yield('content')        
    </div>

    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center" style="z-index:2000">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="modal-content py-4 text-left px-6">
                <div class="flex justify-between items-center pb-3">
                    <p class="text-md font-medium">New Project</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-6">
                    <div class="mt-1">
                        <x-inputs.text name="project_name" id="project_name" value="" required autocomplete="name" autofocus placeholder="Enter your project name"/>
                    </div>
                </div>
                <div class="flex justify-end pt-2">
                    <button class="create_project_btn bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded mr-6">Create</button>
                    <button class="modal-close bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="{{ asset('js/components-v2.js') }}" defer></script> -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    
    
    
    <!-- <script src="{{ asset('js/alpine.js') }}" defer></script> -->
    <script>
        function toggleModal () {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }
    </script>

    @yield('script_sections')
    
    {!! Toastr::message() !!}
</body>
</html>
