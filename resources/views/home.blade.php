@extends('layouts.app')

@section('content')

<main class="-mt-24 pb-8">
    @if(count($exported_videos)>0)
        @include("products")
    @else

    @endif
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        
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
                        <a href="{{route('new_project_page')}}" class="flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
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
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded export_video">
                            Export Video
                        </button>
                    </div>
                    </div>
                </div>
                </section>

                <!-- Actions panel -->
                <section aria-labelledby="quick-links-title">
                    <div class="rounded-lg bg-gray-200 overflow-hidden shadow divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-1 sm:gap-px">
                        @if(count($items)>0)
                        <video width="100%" id="myVideo">
                            <source src="{{asset('mov_bbb.mp4')}}" >
                        </video>
                        @else
                        <img src="{{asset('img/blank1.jpg')}}" class="w-full"/>
                        @endif
                    </div>
                    <div class="video_control mt-5 flex justify-center items-center">
                        <button class="bg-black hover:bg-black text-white font-bold py-1 px-1 rounded preview">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                    <div class="items_container w-full">
                        <!-- <div class="stick absolute top-0 left-0 h-full bg-red-500 w-1 z-50"></div> -->
                    </div> 
                    <div class="anchor5"></div>
                    <div class="anchor6"></div>
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
                                    <div data-resource="{{$resource}}" class="relative">
                                        <a class="absolute top-3 right-3 w-5 text-center bg-red-500 hover:bg-white cursor-pointer rounded-md z-40 add_{{$resource->id}} del_res_btn" title="delete resource">
                                            <i class="icon ion-md-trash text-white hover:text-red-500"></i>
                                        </a>
                                        <a class="absolute top-3 right-10 w-5 text-center bg-green-600 hover:bg-white cursor-pointer rounded-md z-40 del_{{$resource->id}} add_res_btn" title="add to workspace">
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
    var export_video_url = "{{ route('export_video', ['hash'=>$project_hash]) }}";
    var order_video_url = "{{ route('order_video') }}";
    var del_resource_url = "{{ route('del_resource') }}"
    var add_item_url = "{{ route('add_item') }}";
    var project_hash = "{{ $project_hash }}";
    var project_id = "{{ $project_id }}";
    var items = @json($items);
    var max_dur = "{{ $max_dur }}";
    
</script>
<script src="{{ asset('js/home.js') }}"></script>

@endsection