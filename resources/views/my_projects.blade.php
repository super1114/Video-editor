@extends('layouts.app')

@section('styles')
  <style>
  
thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}

tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}


</style>
@endsection

@section('content')

<main class="mt-10 pb-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="bg-white pb-4 px-4 rounded-md w-full">
            <div class="flex justify-between w-full pt-6 ">
                <p class="ml-3">My Projects</p>
            </div>
            <div class="overflow-x-auto mt-6">
              <table class="table-auto border-collapse w-full">
                <thead>
                  <tr class="text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                    <th class="px-4 py-2 bg-gray-400 text-center">No</th>
                    <th class="px-4 py-2 bg-gray-400 text-center">Video</th>
                    <th class="px-4 py-2 bg-gray-400 text-center">QR Code</th>
                    <th class="px-4 py-2 bg-gray-400 text-center">Product Status</th>
                    <th class="px-4 py-2 bg-gray-400 text-center">Action</th>
                  </tr>
                </thead>

                <tbody class="text-sm font-normal text-gray-700">
                    @forelse($exported_videos as $index => $video)
                        <tr data-id="{{$video->id}}" class="hover:bg-gray-100 border-b border-gray-200 py-10">
                            <td class="px-4 py-4 text-center">{{ $index+1 }}</td>
                            <td class="px-4 py-4 text-center">{{$video->name}}</td>
                            <td class="px-4 py-4 text-center">
                                <a href="{{$video->qrcode}}" data-fancybox class="button flex justify-center cursor-pointer preview_qrcode">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                    </svg>   
                                </a>
                            </td>
                            <td class="px-4 py-4 text-center">
                                @if($video->order_status==1)
                                <button class="text-purple-500 bg-transparent border border-solid border-purple-500 hover:bg-purple-500 hover:text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 order_btn" type="button"
                                      >
                                  Order
                                </button>
                                @else @if($video->order_status==2)
                                            Order processing
                                    @else 
                                        @if($video->order_status==3)
                                            delivering
                                        @else
                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-teal-600 bg-teal-200 uppercase last:mr-0 mr-1">
                                              Order Completed
                                            </span>
                                        @endif
                                    @endif
                                @endif
                            </td>
                            <td class="px-4 py-4 text-center">
                                <a href="{{route('project', ['hash'=>$video->hashkey])}}" class="button flex justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border text-center px-2 py-2">
                                No exported video
                            </td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script_sections')
<script>
    var site_url = "{{ env('APP_URL') }}";
    var upload_resource_url = "{{ route('upload_resource') }}";
    var order_video_url = "{{ route('order_video') }}";
    var del_resource_url = "{{ route('del_resource') }}"
    var add_item_url = "{{ route('add_item') }}";
    var save_item_url = "{{ route('save_item') }}"
    
</script>
<script src="{{ asset('js/my_projects.js') }}"></script>

@endsection