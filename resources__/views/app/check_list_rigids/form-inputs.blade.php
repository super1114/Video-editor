@php
    $editing = isset($checkListRigid);
    $url_link = isset($url_link);
@endphp


{{ csrf_field() }}
<x-inputs.group class="w-full" hidden>
    <x-inputs.select name="checklist_type" label="Checklist Type">
        <!-- @php $selected = old('checklist_type', ($editing ? $checkListRigid->checklist_type : 'On')) @endphp -->
        <option 
            value="{{ $check_type }}" 
            selected > {{ $check_type == 'On' ? 'On' : 'Off' }}
        </option>
        <!-- <option value="Off" {{ $selected == 'Off' ? 'selected' : '' }} >Off</option> -->
    </x-inputs.select>
</x-inputs.group>

<!-- <x-inputs.group class="w-full">
    <x-inputs.text
        name="status"
        label="Status"
        value="{{ old('status', ($editing ? $checkListRigid->status : '')) }}"
        maxlength="255"
        required
    ></x-inputs.text>
</x-inputs.group> -->
<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Vehicle Check</h3>
            <p class="mt-1 text-sm text-gray-600">
                Please confirm each of these items has been checked.
            </p>
            </div>
        </div>
        
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-6 gap-6 pb-6">
                    <div class="col-span-6 sm:col-span-2">
                        <div class="">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="paintwork"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "paintwork"
                                                {{$editing ? $checkListRigid->paintwork == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="paintwork" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Paintwork</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="cab_seat"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "cab_seat"
                                                {{$editing ? $checkListRigid->cab_seat == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="cab_seat" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Cab Seat</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="glass_mirrors"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "glass_mirrors"
                                                {{$editing ? $checkListRigid->glass_mirrors == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="glass_mirrors" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Glass / Mirrors </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="valves_controls"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "valves_controls"
                                                {{$editing ? $checkListRigid->valves_controls == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="valves_controls" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Valves & Controls</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="rear_bumper"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "rear_bumper"
                                                {{$editing ? $checkListRigid->rear_bumper == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="rear_bumper" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Rear Bumper</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <div class="">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="wings_stays"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "wings_stays"
                                                {{$editing ? $checkListRigid->wings_stays == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="wings_stays" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Wings / Stays</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="lights"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "lights"
                                                {{$editing ? $checkListRigid->lights == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="lights" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Lights</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="vaccum_pump"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "vaccum_pump"
                                                {{$editing ? $checkListRigid->vaccum_pump == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="vaccum_pump" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Vaccum Pump</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="levels"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "levels"
                                                {{$editing ? $checkListRigid->levels == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="levels" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Levels</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                        <div class="">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="camera_operation"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "camera_operation"
                                                {{$editing ? $checkListRigid->camera_operation == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="camera_operation" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Camera Operation</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="cab_inside_out"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "cab_inside_out"
                                                {{$editing ? $checkListRigid->cab_inside_out == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="cab_inside_out" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Cab Inside/Out</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="side_guards"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "side_guards"
                                                {{$editing ? $checkListRigid->side_guards == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="side_guards" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Side Guards</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center">
                                <div class="max-w-xl w-full -mx-auto">
                                    <div class="flex items-center" x-data="{ on: false }">
                                        <div class="toggle colour">
                                            <input
                                                id="book_pack"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                {{$url_link ? 'disabled' : ''}}
                                                name = "book_pack"
                                                {{$editing ? $checkListRigid->book_pack == true ? 'checked' : '' : ''}}
                                            />
                                            <label for="book_pack" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Book Pack</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 col-span-3 sm:col-span-3">
                        <label for="last_known_product" class="block text-sm font-medium text-gray-700">Last Known Product</label>
                        <input type="text"
                             value = "{{$editing ? $checkListRigid->last_known_product : ''}}"
                             {{$url_link ? 'disabled' : ''}}
                             name="last_known_product" id="last_known_product" autocomplete="" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mt-6 col-span-3 sm:col-span-3">
                        <label for="mileage" class="block text-sm font-medium text-gray-700">Mileage</label>
                        <input type="text" name="mileage" 
                        value = "{{$editing ? $checkListRigid->mileage : ''}}"
                        {{$url_link ? 'disabled' : ''}}
                        id="mileage" autocomplete="" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="mt-6 col-span-3 sm:col-span-3">                        
                        <div>
                            <legend class="text-base font-medium text-gray-900">Vessel Condition</legend>
                        </div>
                        <div class="mt-4 space-y-4">
                            <div class="flex items-center">
                                <input id="Good" value="Good" name="vessel_condition" type="radio" 
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                {{$editing ? $checkListRigid->vessel_condition == 'Good' ? 'checked' : '' : 'checked'}}
                        {{$url_link ? 'disabled' : ''}}
                                >
                                <label for="Good" class="ml-3 block text-sm font-medium text-gray-700">
                                    Good
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="Average" value="Average"
                                    name="vessel_condition" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                    {{$editing ? $checkListRigid->vessel_condition == 'Average' ? 'checked' : '' : ''}}
                        {{$url_link ? 'disabled' : ''}}
                                >
                                <label for="Average" class="ml-3 block text-sm font-medium text-gray-700">
                                    Average
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="Poor" value="Poor" 
                                    name="vessel_condition" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                    {{$editing ? $checkListRigid->vessel_condition == 'Poor' ? 'checked' : '' : ''}}
                        {{$url_link ? 'disabled' : ''}}
                                >
                                <label for="Poor" class="ml-3 block text-sm font-medium text-gray-700">
                                    Poor
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="unserviceable"
                                    value="Unserviceable"
                                    name="vessel_condition" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                    {{$editing ? $checkListRigid->vessel_condition == 'Unserviceable' ? 'checked' : '' : ''}}
                        {{$url_link ? 'disabled' : ''}}
                                >
                                <label for="unserviceable" class="ml-3 block text-sm font-medium text-gray-700">
                                    Unserviceable
                                </label>
                            </div>
                        </div>                        
                    </div>
                    
                    <div class="mt-6 col-span-3 sm:col-span-3">                        
                        <div>
                            <legend class="text-base font-medium text-gray-900">Fuel Level</legend>
                        </div>
                        <div class="mt-4 space-y-4">
                            <div class="flex items-center">
                                <input id="Empty" value="Empty" name="fuel_level" type="radio" 
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                {{$editing ? $checkListRigid->fuel_level == 'Empty' ? 'checked' : '' : 'checked'}}
                        {{$url_link ? 'disabled' : ''}}
                                >
                                <label for="Empty" class="ml-3 block text-sm font-medium text-gray-700">
                                    Empty
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="1/4" value="1/4"
                                    name="fuel_level" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                    {{$editing ? $checkListRigid->fuel_level == '1/4' ? 'checked' : '' : ''}}
                        {{$url_link ? 'disabled' : ''}}
                                >
                                <label for="1/4" class="ml-3 block text-sm font-medium text-gray-700">
                                    1/4
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="1/2" value="1/2" 
                                    name="fuel_level" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                    {{$editing ? $checkListRigid->fuel_level == '1/2' ? 'checked' : '' : ''}}
                        {{$url_link ? 'disabled' : ''}}
                                >
                                <label for="1/2" class="ml-3 block text-sm font-medium text-gray-700">
                                    1/2
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="3/4"
                                    value="3/4"
                                    name="fuel_level" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                    {{$editing ? $checkListRigid->fuel_level == '3/4' ? 'checked' : '' : ''}}
                        {{$url_link ? 'disabled' : ''}}
                                >
                                <label for="3/4" class="ml-3 block text-sm font-medium text-gray-700">
                                    3/4
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="Full"
                                    value="Full"
                                    name="fuel_level" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                    {{$editing ? $checkListRigid->fuel_level == 'Full' ? 'checked' : '' : ''}}
                        {{$url_link ? 'disabled' : ''}}
                                >
                                <label for="Full" class="ml-3 block text-sm font-medium text-gray-700">
                                    Full
                                </label>
                            </div>
                        </div>                        
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <div class="">
                            <label for="notes" class="block text-sm font-medium text-gray-700">
                                    Notes
                            </label>
                            <div class="mt-1">
                            <textarea
                                id="notes"
                                name="notes"
                        {{$url_link ? 'disabled' : ''}}
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{$editing ? $checkListRigid->notes : ''}}</textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Note any damage in items checked above.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Video Walkaround</h3>
            <p class="mt-1 text-sm text-gray-600">
                Please video a complete walk around of the vehicle paying particular attention to any damages.
            </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-6 gap-6 pb-6">
                    {{-- Column 1 33.3% --}}
                    <script>
                        var int_video_source = "{{ old('int_Video', ($editing ? $checkListRigid->int_video : '')) }}";
                        var ext_video_source = "{{ old('ext_Video', ($editing ? $checkListRigid->ext_video : '')) }}";
                    </script>
                    
                    <div class="col-span-6 sm:col-span-3 align-top" style="height : 210px">
                        <video-tag id="internal-video-tag" ></video-tag>
                    </div>
                    <input 
                    {{$url_link ? 'disabled' : ''}}
                    name = "int_video" id = "int_video_form"  value = "{{ old('int_video', ($editing ? $checkListRigid->int_video : '')) }}" hidden>

                    {{-- Column 2 33.3%--}}
                    <div class="col-span-6 sm:col-span-3"  style="height : 210px">
                        <video-tag id="external-video-tag"></video-tag>
                    </div>
                    <input
                    {{$url_link ? 'disabled' : ''}}
                     name = "ext_video" id = "ext_video_form" value = "{{ old('ext_video', ($editing ? $checkListRigid->ext_video : '')) }}" hidden>
                    <!-- {{-- Column 3 33.3%--}}
                    <div class="col-span-4 sm:col-span-2" style="visibility:hidden">
                        <img class="mx-auto" src="/img/vid.jpg" alt="">
                    </div> -->
                    {{-- Column 4 100%--}}
                    <div class="col-span-6 sm:col-span-6">
                        <p class="mt-2 text-sm text-gray-500">Tap the video icon to open the video recorder, click the record button to start/stop recording.</p>
                        <p class="mt-2 text-sm text-gray-500">Each video can be up-to X minutes/seconds long.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Cleaning Certificate</h3>
            <p class="mt-1 text-sm text-gray-600">
                Please upload the image to certificate the cleaning status here.
            </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">                
                    <div class="col-md-12 d-flex align-items-center justify-content-center">                        
                        <div class="mt-1 border border-gray-200">                                                        
                            <img id="cleaning_status_image" class="mx-auto"
                                src="{{old('cleaning_status', $editing ? ($checkListNr->cleaning_status && str_contains($checkListNr->cleaning_status, '/')) ? asset('storage/'.$checkListNr->cleaning_status) : '/img/tanker1.jpg' : '/img/tanker1.jpg')}}" alt="cleaning_status_image">                            
                            <input type="file" id="cleaning_status_image_form" name = 'cleaning_status' hidden
                            value = "{{old('cleaning_status', $editing ? $checkListNr->cleaning_status : '/img/tanker.jpg')}}" accept="image/*"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Tyre Check</h3>
        <p class="mt-1 text-sm text-gray-600">
            Please confirm tread depth on all tyres.
        </p>
        </div>
    </div>
    <div class="mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                <div class="col-span-3 sm:col-span-3">

                    <fieldset>
                    <div class="mt-1 bg-white rounded-md shadow-sm -space-y-px">
                        {{-- <div>
                        <label for="card-number" class="sr-only">Card number</label>
                        <input type="text" name="card-number" id="card-number" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-t-md bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="Card number">
                        </div> --}}
                        <div class="flex -space-x-px">
                        <div class="flex-1 min-w-0 relative block w-full text-center">
                            <span type="text" class="relative block w-full rounded-none rounded-tl-md rounded-tr-md bg-transparent focus:z-10 sm:text-sm border-gray-300">
                                Tyres
                            </span>
                        </div>
                        </div>
                        <div class="flex -space-x-px">
                        <div class="w-1/4 flex-1 min-w-0">
                            <!-- <input type="text" name="tyres_1_1" id="tyres_1_1" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="mm"> -->

                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_1_1"
                                    value="{{ old('tyres_1_1', ($editing ? $checkListRigid->tyres_1_1 : '')) }}"
                                    maxlength="255"
                                    disabled
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_1_1"
                                    value="{{ old('tyres_1_1', ($editing ? $checkListRigid->tyres_1_1 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <input type="text" name="" id="" class="relative block w-full rounded-none bg-gray-100 focus:z-10 sm:text-sm border-gray-300" disabled>
                        </div>
                        <div class="flex-1 min-w-0">
                            <input type="text" name="" id="" class="relative block w-full rounded-none bg-gray-100 focus:z-10 sm:text-sm border-gray-300" disabled>
                        </div>
                        <div class="flex-1 min-w-0">
                            <!-- <input type="text" name="tyres_1_4" id="tyres_1_4" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="mm"> -->
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_4_1"
                                    value="{{ old('tyres_4_1', ($editing ? $checkListRigid->tyres_4_1 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    disabled
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_4_1"
                                    value="{{ old('tyres_4_1', ($editing ? $checkListRigid->tyres_4_1 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        </div>
                        <div class="flex -space-x-px">
                        <div class="w-1/4 flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_1_2"
                                    value="{{ old('tyres_1_2', ($editing ? $checkListRigid->tyres_1_2 : '')) }}"
                                    maxlength="255"
                                    disabled
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_1_2"
                                    value="{{ old('tyres_1_2', ($editing ? $checkListRigid->tyres_1_2 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_2_1"
                                    value="{{ old('tyres_2_1', ($editing ? $checkListRigid->tyres_2_1 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    disabled
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_2_1"
                                    value="{{ old('tyres_2_1', ($editing ? $checkListRigid->tyres_2_1 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_3_1"
                                    value="{{ old('tyres_3_1', ($editing ? $checkListRigid->tyres_3_1 : '')) }}"
                                    maxlength="255"
                                    disabled
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_3_1"
                                    value="{{ old('tyres_3_1', ($editing ? $checkListRigid->tyres_3_1 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_4_2"
                                    value="{{ old('tyres_4_2', ($editing ? $checkListRigid->tyres_4_2 : '')) }}"
                                    maxlength="255"
                                    disabled
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_4_2"
                                    value="{{ old('tyres_4_2', ($editing ? $checkListRigid->tyres_4_2 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        </div>
                        <div class="flex -space-x-px">
                        <div class="w-1/4 flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_1_3"
                                    value="{{ old('tyres_1_3', ($editing ? $checkListRigid->tyres_1_3 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    disabled
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_1_3"
                                    value="{{ old('tyres_1_3', ($editing ? $checkListRigid->tyres_1_3 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_2_2"
                                    value="{{ old('tyres_2_2', ($editing ? $checkListRigid->tyres_2_2 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    disabled
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_2_2"
                                    value="{{ old('tyres_2_2', ($editing ? $checkListRigid->tyres_2_2 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_3_2"
                                    value="{{ old('tyres_3_2', ($editing ? $checkListRigid->tyres_3_2 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    disabled
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_3_2"
                                    value="{{ old('tyres_3_2', ($editing ? $checkListRigid->tyres_3_2 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_4_3"
                                    value="{{ old('tyres_4_3', ($editing ? $checkListRigid->tyres_4_3 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    disabled
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_4_3"
                                    value="{{ old('tyres_4_3', ($editing ? $checkListRigid->tyres_4_3 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        </div>
                        <div class="flex -space-x-px">
                        <div class="w-1/4 flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_1_4"
                                    value="{{ old('tyres_1_4', ($editing ? $checkListRigid->tyres_1_4 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    disabled
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_1_4"
                                    value="{{ old('tyres_1_4', ($editing ? $checkListRigid->tyres_1_4 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_2_3"
                                    value="{{ old('tyres_2_3', ($editing ? $checkListRigid->tyres_2_3 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    disabled
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_2_3"
                                    value="{{ old('tyres_2_3', ($editing ? $checkListRigid->tyres_2_3 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_3_3"
                                    value="{{ old('tyres_3_3', ($editing ? $checkListRigid->tyres_3_3 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    disabled
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_3_3"
                                    value="{{ old('tyres_3_3', ($editing ? $checkListRigid->tyres_3_3 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            @if($url_link)
                                <x-inputs.text
                                    name="tyres_4_4"
                                    value="{{ old('tyres_4_4', ($editing ? $checkListRigid->tyres_4_4 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    disabled
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @else
                                <x-inputs.text
                                    name="tyres_4_4"
                                    value="{{ old('tyres_4_4', ($editing ? $checkListRigid->tyres_4_4 : '')) }}"
                                    maxlength="255"
                                    placeholder="mm"
                                    style="margin-bottom:0px !important"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm mb- border-gray-300  py-2"
                                ></x-inputs.text>
                            @endif
                        </div>
                        </div>
                    </div>
                    </fieldset>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Tanker Inspection</h3>
        <p class="mt-1 text-sm text-gray-600">
            Please mark any damage on the splat diagram.
        </p>
        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                    <a id = "left-side">
                        <img id="left-side-image" class="mx-auto" src="{{$editing ? $checkListRigid->ext_splat_left : '/img/splat-side-1.png'}}" alt="left-side-image">
                    </a>
                    <input 
                            {{$url_link ? 'disabled' : ''}}
                    id = "left-side-image-form" name = 'ext_splat_left' hidden value = "{{$editing ? $checkListRigid->ext_splat_left : '/img/splat-side-1.png'}}"/>
                </div>
            </div>
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                        <a id = "front-side"><img id="front-side-image" class="mx-auto" src="{{$editing ? $checkListRigid->ext_splat_front : '/img/splat-side-front.png'}}" alt="front-side-image"></a>
                    <input {{$url_link ? 'disabled' : ''}} id = "front-side-image-form" name = 'ext_splat_front' hidden value = "{{$editing ? $checkListRigid->ext_splat_front : '/img/splat-side-front.png'}}" />
                </div>
            </div>

            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                        <a id = "back-side"><img id="back-side-image" class="mx-auto" src="{{$editing ? $checkListRigid->ext_splat_rear : '/img/splat-rear.png'}}" alt="back-side-image"></a>
                    <input
                            {{$url_link ? 'disabled' : ''}} id = "back-side-image-form" name = 'ext_splat_rear' hidden
                        value = "{{$editing ? $checkListRigid->ext_splat_rear : '/img/splat-rear.png'}}"
                    />
                </div>
            </div>

            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                        <a id = "right-side"><img id="right-side-image" class="mx-auto" 
                            src="{{$editing ? $checkListRigid->ext_splat_right : '/img/splat-side-2.png'}}"
                            alt="right-side-image"></a>
                    <input
                            {{$url_link ? 'disabled' : ''}} id = "right-side-image-form" name = 'ext_splat_right' hidden
                        value = "{{$editing ? $checkListRigid->ext_splat_right : '/img/splat-side-2.png'}}"
                    />
                </div>
            </div>

            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                        <a id = "internal"><img id="internal-image" class="mx-auto" src="{{$editing ? $checkListRigid->int_splat : '/img/splat-internal.png'}}" alt="internal-image"></a>
                    <input
                            {{$url_link ? 'disabled' : ''}} id = "internal-image-form" name = 'int_splat' hidden
                        value = "{{$editing ? $checkListRigid->int_splat : '/img/splat-internal.png'}}"
                    />
                </div>
            </div>

        </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>

@include('components.section.signature-form', [
    'editing' => $editing,
    'data' => $editing ? $checkListRigid : null
])


<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    <div class="border-t border-gray-200"></div>
    </div>
</div>

<script>
    var image_saveUrl = '{{route("images.store")}}'
    var asset_url =  "{{env('ASSET_URL')}}/pixie"
    var csrf_token =  "{{ csrf_token() }}"
    var editing = "{{ $editing }}"
    var hire = {!! json_encode($hire) !!}
</script>

<script src="{{ asset('js/checklist.js') }}"></script>
<script src="{{ asset('js/signature.js') }}"></script>