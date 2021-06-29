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
                <div class="rounded-lg bg-white overflow-hidden shadow">
                    <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                    <div class="bg-white p-6">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="sm:flex sm:space-x-5">
                            <div class="text-center sm:mt-1 sm:pt-1 sm:text-left">
                                <p class="text-lg font-bold text-gray-900 sm:text-4xl mb-3">WELCOME TO VIDEO EDITOR</p>
                                <p class="text-xl font-bold text-gray-700 sm:text-1xl">{{ $project_name }}</p>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-center sm:mt-0">
                        <a href="" class="flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 new_project">
                            New Project
                        </a>
                        </div>
                    </div>
                    </div>
                    <div class="border-t border-gray-200 bg-gray-50 grid grid-cols-1 divide-y divide-gray-200 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                    <div class="px-6 py-5 text-sm font-medium text-center">
                        <input type="file" name="file" id="upload_file" style="display:none"/>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded upload_btn">
                            Upload Resource
                        </button>
                        <div wire:loading class="hidden w-full h-full z-50 overflow-hidden opacity-75 flex flex-col items-center justify-center uploading">
                            <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-7 w-7"></div>
                        </div>
                    </div>

                    <div class="px-6 py-5 text-sm font-medium text-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Save Project
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
                    <div class="video_control mt-5 flex justify-center items-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded preview">preview</button>
                    </div>
                    <div class="w-full">
                        <!-- <div class="mt-2 time_frame_text w-full h-3 flex items-center justify-between">
                            <span class="w-full h-2">1</span>
                            <span class="w-full h-2">2</span>
                            <span class="w-full h-2">3</span>
                            <span class="w-full h-2">4</span>
                            <span class="w-full h-2">5</span>
                            <span class="w-full h-2">6</span>
                            <span class="w-full h-2">7</span>
                            <span class="w-full h-2">8</span>
                        </div>
                        <div class="mt-2 time_frame w-full h-3 flex items-center justify-between">
                            <span class="border-l-2 border-black w-full h-2"></span>
                            <span class="border-l-2 border-black w-full h-2"></span>
                            <span class="border-l-2 border-black w-full h-2"></span>
                            <span class="border-l-2 border-black w-full h-2"></span>
                            <span class="border-l-2 border-black w-full h-2"></span>
                            <span class="border-l-2 border-black w-full h-2"></span>
                            <span class="border-l-2 border-black w-full h-2"></span>
                            <span class="border-l-2 border-black w-full h-2"></span>
                        </div> -->
                        <div class="slider mt-4"></div>    
                        <div class="slider mt-4"></div>        
                        <div class="slider mt-4"></div>        
                    </div>
                    
                </section>
            </div>

            <!-- Right column -->
            <div class="grid grid-cols-1 gap-4">
                <section aria-labelledby="movements-title">
                    <div class="rounded-lg bg-white overflow-hidden shadow">
                        <div class="p-6">
                            <h2 class="text-base font-medium text-gray-900 mb-3" id="movements-title">Resources</h2>
                            <div class="grid grid-cols-2 gap-4 resources">
                                @forelse($resources as $resource)
                                    <div data-id="{{$resource->id}}" class="relative">
                                        <a class="absolute top-3 right-3 w-5 text-center bg-red-500 hover:bg-white cursor-pointer rounded-md z-50 add_{{$resource->id}} add_res_btn">
                                            <i class="icon ion-md-trash text-white hover:text-red-500"></i>
                                        </a>
                                        <a class="absolute top-3 right-10 w-5 text-center bg-green-600 hover:bg-white cursor-pointer rounded-md z-50 del_{{$resource->id}} del_res_btn">
                                            <i class="icon ion-md-add text-white hover:text-green-600"></i>
                                        </a>
                                        <img src="{{asset($resource->thumbnail)}}" class="w-full rounded-md hover:opacity-80 z-0 res_img" data-id="{{$resource->id}}" />
                                        <div class= "text-center">{{ $resource->name }}</div>
                                    </div>
                                @empty
                                    <div class="flex-grow w-full">
                                        No resources
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>

                <section aria-labelledby="recent-hires-title">
                    <div class="rounded-lg bg-white overflow-hidden shadow">
                        <div class="p-6">
                            <h2 class="text-base font-medium text-gray-900 pb-3" id="recent-hires-title">Recent Projects</h2>
                            @foreach($projects as $project)
                            <div class="mt-2 border-b flex">        
                                <a href="{{ route('project', ['hash'=>$project->hashkey]) }}" class="w-full px-2 py-1 text-sm font-medium text-gray-700 bg-white">{{$project->name}}</a>
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
    var site_url = "{{ env('APP_URL') }}";
    var upload_resource_url = "{{ route('upload_resource') }}";

    var project_hash = "{{ $project_hash }}";

</script>
<script src="{{ asset('js/home.js') }}"></script>

@endsection