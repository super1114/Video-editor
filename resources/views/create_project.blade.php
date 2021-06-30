<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Video Editor - Create Project</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <!-- Icons -->
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" />
        <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    </head>
    <body >
        <div class="min-h-screen flex flex-col items-center justify-center bg-gray-300">
          <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
            <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-800">Create Your First Project</div>
            <div class="relative mt-10 h-px bg-gray-300">
              <div class="absolute left-0 top-0 flex justify-center w-full -mt-2">
                <span class="bg-white px-4 text-xs text-gray-500 uppercase">Create a perfect video.</span>
              </div>
            </div>
            <div class="mt-10">
              <form action="" method="post" id="createProjectForm">
                <div class="flex flex-col mb-6">
                  <label for="project_name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Project Name:</label>
                  <div class="relative">
                    <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                      </span>
                    </div>

                    <input id="project_name" type="text" name="project_name" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Project Name" required />
                  </div>
                </div>

                <div class="flex w-full">
                  <button type="submit" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-gray-600 hover:bg-gray-700 rounded py-2 w-full transition duration-150 ease-in">
                    <span class="mr-2 uppercase">Create Project</span>
                    <span>
                      <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    </span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <script type="text/javascript">
            var site_url = "{{ env('APP_URL') }}";
        </script>
        <script type="text/javascript" src="{{asset('js/create_project.js')}}"></script>
    </body>
</html>
