@if($is_parent==true)
<div data-item="{{$item}}" class="relative text-white flex items-center justify-start time_slot_parent bg-gray-700 h-12" id="item_{{$item->id}}">
    @foreach($item->slots()->orderBy('t_start')->get() as $slot)
    <div id="slot_{{$slot->id}}" data-slot="{{$slot}}" class="absolute flex items-center justify-start rounded-md time_slot" style="{{$slot->getWidth().$slot->getLeftStyle()}}">
        <img class="h-12 rounded-sm" src="{{$item->resource->thumbnail}}" alt="">
        <div class="bg-gray-900 rounded-sm h-12 w-full"></div>    
    </div>
    @endforeach
    <div class=""></div>
</div>
@else
    @foreach($item->slots()->orderBy('t_start')->get() as $slot)
    <div id="slot_{{$slot->id}}" data-slot="{{$slot}}" class="absolute flex items-center justify-start rounded-md time_slot" style="{{$slot->getWidth().$slot->getLeftStyle()}}">
        <img class="h-12 rounded-sm" src="{{$item->resource->thumbnail}}" alt="">
        <div class="bg-gray-900 rounded-sm h-12 w-full"></div>    
    </div>
    @endforeach
    <div class=""></div>
@endif