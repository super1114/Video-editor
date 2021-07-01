<div data-resource="{{$resource}}" class="relative">
    <a class="absolute top-3 right-3 w-5 text-center bg-red-500 hover:bg-white cursor-pointer rounded-md z-50 add_{{$resource->id}} del_res_btn">
        <i class="icon ion-md-trash text-white hover:text-red-500"></i>
    </a>
    <a class="absolute top-3 right-10 w-5 text-center bg-green-600 hover:bg-white cursor-pointer rounded-md z-50 del_{{$resource->id}} add_res_btn">
        <i class="icon ion-md-add text-white hover:text-green-600"></i>
    </a>
    <img src="{{asset($resource->thumbnail)}}" class="w-full rounded-md hover:opacity-80 z-0 res_img" data-id="{{$resource->id}}" />
    <div class= "text-center">{{ $resource->name }}</div>
</div>