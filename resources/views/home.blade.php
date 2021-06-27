@extends('layouts.app')

@section('content')

<main class="-mt-24 pb-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h1 class="sr-only">Profile</h1>
        <!-- Main 3 column grid -->
        <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
            <!-- Left column -->
            <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                <!-- Welcome panel -->
                <section aria-labelledby="profile-overview-title">
                <div class="rounded-lg bg-1 overflow-hidden shadow">
                    <h2 class="sr-only color-1" id="profile-overview-title">Profile Overview</h2>
                    <div class="bg-1 p-6">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="sm:flex sm:space-x-5">
                        <div class="flex-shrink-0">
                        @if(Auth::user()->photo == '')
                            <img src="{{ asset('img/default_avatar.png') }}" class="rounded-full" width="100" />
                        @else
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="rounded-full" width="100" />
                        @endif
                        </div>
                        <div class="mt-3 text-center sm:mt-1 sm:pt-3 sm:text-left">
                            <p class="text-xl font-bold color-2 sm:text-1xl">{{ $project_name }}</p>
                            <p class="text-lg font-bold color-1 sm:text-4xl">WELCOME TO VIDEO EDITOR</p>
                        </div>
                        </div>
                        <div class="mt-5 flex justify-center sm:mt-0">
                        <a href="" class="button flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 new_project">
                            New Project
                        </a>
                        </div>
                    </div>
                    </div>
                    <div class="border-t bg-2 grid grid-cols-1 divide-y divide-gray-200 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                    <div class="px-6 py-5 text-sm font-medium text-center">
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                            Upload
                        </button>
                    </div>

                    <div class="px-6 py-5 text-sm font-medium text-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Preview
                        </button>
                    </div>

                    <div class="px-6 py-5 text-sm font-medium text-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Export
                        </button>
                    </div>
                    </div>
                </div>
                </section>

                <!-- Actions panel -->
                <section aria-labelledby="quick-links-title">
                    <div class="rounded-lg bg-gray-200 overflow-hidden shadow divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-1 sm:gap-px">
                        <video src="{{asset('mov_bbb.mp4')}}" width="100%"></video>
                    </div>
                    <div class="slider_wrapper mt-8 w-full">
                        <div id="slider"></div>
                        <div class="slider_time_pos"></div>
                    </div>
                </section>
            </div>

            <!-- Right column -->
            <div class="grid grid-cols-1 gap-4">


                <section aria-labelledby="movements-title">
                    <div class="rounded-lg bg-4 overflow-hidden shadow">
                        <div class="p-6">
                        <h2 class="text-base font-medium color-1" id="movements-title">Resources</h2>
                        <div class="mt-6">
                            <a href="" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium button text-gray-700 bg-white hover:bg-gray-50">
                            View all
                            </a>
                        </div>
                    </div>
                </div>
                </section>

                <section aria-labelledby="recent-hires-title">
                <div class="rounded-lg bg-4 overflow-hidden shadow">
                    <div class="p-6">
                        <h2 class="text-base font-medium color-1 pb-3" id="recent-hires-title">Recent Projects</h2>
                        @foreach($projects as $project)
                        <div class="mt-2 flex bg-1">        
                            <a href="{{ route('project', ['hash'=>$project->hashkey]) }}" class="w-full px-2 py-1 text-sm font-medium bg-4 color-2">{{$project->name}}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                </section>
            </div>
            
        </div>
    </div>
    </main>

@endsection

@section('script_sections')
<script>
    
</script>
<script src="{{ asset('js/home.js') }}"></script>

@endsection