@extends('layouts.app')

@section("styles")
<link rel="stylesheet" type="text/css" href="{{asset('css/dragDrop.css')}}">
@endsection

@section('content')

<main class="mt-10 pb-8">
    <input type="file" name="file" id="upload_file" style="display:none"/>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="flex items-start justify-between">
            <h5 class="text-2xl font-bold leading-normal mt-0 mb-2 text-gray-800 w-5/6">
              {{$project_name}}
            </h5>
            <button class="text-pink-500 bg-transparent border border-solid border-pink-500 hover:bg-pink-500 hover:text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 upload_btn" type="button"
                  >
              Upload
            </button>
            <button class="text-teal-500 bg-transparent border border-solid border-teal-500 hover:bg-green-500 hover:text-white active:bg-teal-600 font-bold uppercase text-xs px-4 py-2 rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 export_video" type="button"
                  >
              Export
            </button>
        </div>
     
        <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
            <!-- Left column -->
            <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                <!-- Actions panel -->
                <section aria-labelledby="quick-links-title">
                    <div class="relative rounded-lg bg-gray-200 overflow-hidden shadow divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-1 sm:gap-px">
                        <button class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded-full preview z-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                        @if(count($items)>0)
                        <video width="100%" id="myVideo">
                            <source src="{{asset($items[0]->resource->path)}}" >
                        </video>
                        @else
                        <img src="{{asset('img/blank1.jpg')}}" class="w-full"/>
                        @endif
                    </div>
                </section>
            </div>

            <!-- Right column -->
            <div class="grid grid-cols-1 gap-4">
                <section aria-labelledby="movements-title">
                    <div class="rounded-lg bg-white overflow-hidden shadow">
                        <div class="p-2">
                            <h2 class="text-base font-medium text-gray-900 mb-1" id="movements-title" draggable="true">Media</h2>
                            <div class="grid grid-cols-2 gap-4 resources">
                                @forelse($resources as $resource)
                                    <div class="each m-1 shadow-lg relative cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110" >
                                        <img class="w-full eachRes" data-resource="{{$resource}}" src="{{asset($resource->thumbnail)}}" alt="" draggable="true"/>
                                        <div class="hidden badge absolute top-0 right-0 bg-indigo-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">    {{$resource->getTime()}}
                                        </div>
                                        <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                                            <span class="mr-1 p-1 px-2 font-bold truncate">{{$resource->name}}</span>
                                        </div>
                                    </div>  
                                @empty
                                    <div class="flex-grow w-full">
                                        No Media
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="mt-6 py-3 px-5 bg-gray-800 h-12 w-full flex items-center justify-start">
            <button class="mr-2 text-gray-300 bg-transparent border border-solid border-blueGray-500 hover:bg-blueGray-500 hover:text-white active:bg-blueGray-600 font-bold uppercase text-xs px-2 py-1 rounded-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
                </svg>
            </button>
            <button class="mr-2 text-gray-300 bg-transparent border border-solid border-blueGray-500 hover:bg-blueGray-500 hover:text-white active:bg-blueGray-600 font-bold uppercase text-xs px-2 py-1 rounded-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
            <button class="text-gray-300 bg-transparent border border-solid border-blueGray-500 hover:bg-blueGray-500 hover:text-white active:bg-blueGray-600 font-bold uppercase text-xs px-2 py-1 rounded-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
            </button>
        </div>
        <div class="canvasArea bg-gray-600">
            <canvas height="30" width="1800" class="timelineCanvas"></canvas>
        </div>
        <div class="overflow-x-scroll py-3 px-5 bg-gray-600 grid grid-rows-2 md:grid-rows-2 gap-2" id="workspace">
            @forelse($items as $item)
            <div class="text-white flex items-center justify-start">
                <img class="h-12 mr-2 rounded-sm" src="{{$item->resource->thumbnail}}" alt="">
                <div class="bg-gray-700 rounded-sm h-12 border-dashed border-2 border-gray-200"  style="{{$item->getWidth()}}"></div>
            </div>
            @empty
                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-br from-gray-400 to-gray-600 text-center leading-normal">
                  Drag and drop media to the timeline
                </h1>
            @endforelse
            
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
    var save_item_url = "{{ route('save_item') }}"
    
</script>
<script src="{{ asset('js/home.js') }}"></script>
<script src="{{ asset('js/dragDrop.js') }}"></script>

@endsection