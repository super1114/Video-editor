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
                    <th class="px-4 py-2 bg-gray-400 ">Title</th>
                    <th class="px-4 py-2 bg-gray-400">Author</th>
                    <th class="px-4 py-2 bg-gray-400">Views</th>
                  </tr>
                </thead>
                <tbody class="text-sm font-normal text-gray-700">
                  <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                    <td class="px-4 py-4">Intro to CSS</td>
                    <td class="px-4 py-4">Adam</td>
                    <td class="px-4 py-4">858</td>
                  </tr>
                  <tr class="hover:bg-gray-100 border-b border-gray-200 py-4">
                    <td class="px-4 py-4 flex items-center"> 
                     A Long and Winding Tour of the History of UI Frameworks and Tools and the Impact on Design</td>
                    <td class="px-4 py-4">Adam</td>
                    <td class="px-4 py-4">112</td>
                  </tr>
                  <tr class="hover:bg-gray-100  border-gray-200">
                    <td class="px-4 py-4">Intro to JavaScript</td>
                    <td class="px-4 py-4">Chris</td>
                    <td class="px-4 py-4">1,280</td>
                  </tr>
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