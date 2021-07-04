<div class="each m-1 shadow-lg relative cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
    <img class="w-full eachRes" data-resource="{{$resource}}" src="{{asset($resource->thumbnail)}}" alt="" draggable="true"/>
    <div class="hidden badge absolute top-0 right-0 bg-indigo-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">
        {{$resource->getTime()}}
    </div>
    <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
        <span class="mr-1 p-1 px-2 font-bold truncate">{{$resource->name}}</span>
    </div>
</div>
