<div class="text-white flex items-center justify-start time_slot_parent bg-gray-700">
    @foreach($item->slots as $slot)
    <div data-item="{{$slot}}" class="flex items-center justify-start rounded-md time_slot">
        <img class="h-12 rounded-sm" src="{{$item->resource->thumbnail}}" alt="">
        <div class="bg-gray-900 rounded-sm h-12 "  style="{{$slot->getWidth()}}"></div>    
    </div>
    @endforeach
    <div class="w-full"></div>
</div>