@extends('layouts.app')

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
                            <source src="{{asset('mov_bbb.mp4')}}" >
                        </video>
                        @else
                        <img src="{{asset('img/blank1.jpg')}}" class="w-full"/>
                        @endif
                    </div>
                    <div class="items_container w-full">
                        
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
    var save_item_url = "{{ route('save_item') }}"
    
</script>
<script src="{{ asset('js/home.js') }}"></script>

@endsection