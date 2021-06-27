@php
    $editing = isset($checkListNr);
    $url_link = isset($url_link);
@endphp

{{ csrf_field() }}

<x-inputs.group class="w-full" hidden>
    <x-inputs.select name="checklist_type" label="Checklist Type">
        <!-- @php $selected = old('checklist_type', ($editing ? $checkListNr->checklist_type : 'On')) @endphp -->
        <option  value="{{ $check_type }}" selected>{{ $check_type == 'On' ? 'On' : 'Off' }}</option>
        <!-- <option value="Off" {{ $selected == 'Off' ? 'selected' : '' }} >Off</option> -->
    </x-inputs.select>
</x-inputs.group>

<!-- <x-inputs.group class="w-full">
    <x-inputs.text
        name="status"
        label="Status"
        value="{{ old('status', ($editing ? $checkListNr->status : '')) }}"
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
                                                id="cladding_panels"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                name = "cladding_panels"
                                                {{$editing ? $checkListNr->cladding_panels == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
                                            />
                                            <label for="cladding_panels" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Cladding Panels</span>
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
                                                id="wings_stays"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                name = "wings_stays"
                                                {{$editing ? $checkListNr->wings_stays == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
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
                                                id="dipstrick"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                name = "dipstrick"
                                                {{$editing ? $checkListNr->dipstrick == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
                                            />
                                            <label for="dipstrick" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Dipstick</span>
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
                                                id="handrail_ladder"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                name = "handrail_ladder"
                                                {{$editing ? $checkListNr->handrail_ladder == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
                                            />
                                            <label for="handrail_ladder" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Handrail / Ladder</span>
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
                                                name = "rear_bumper"
                                                {{$editing ? $checkListNr->rear_bumper == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
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
                                                id="lights"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                name = "lights"
                                                {{$editing ? $checkListNr->lights == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
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
                                                id="valve_operation"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                name = "valve_operation"
                                                {{$editing ? $checkListNr->valve_operation == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
                                            />
                                            <label for="valve_operation" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Valve Operation</span>
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
                                                id="compartment_internal"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                name = "compartment_internal"
                                                {{$editing ? $checkListNr->compartment_internal == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
                                            />
                                            <label for="compartment_internal" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Compartment / Internal</span>
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
                                                id="engine"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                name = "engine"
                                                {{$editing ? $checkListNr->engine == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
                                            />
                                            <label for="engine" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Engine</span>
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
                                                id="fire_extinguisher"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                name = "fire_extinguisher"
                                                {{$editing ? $checkListNr->fire_extinguisher == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
                                            />
                                            <label for="fire_extinguisher" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Fire Extinguiser</span>
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
                                                name = "side_guards"
                                                {{$editing ? $checkListNr->side_guards == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
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
                                                id="vacuum_pump"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                name = "vacuum_pump"
                                                {{$editing ? $checkListNr->vacuum_pump == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
                                            />
                                            <label for="vacuum_pump" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Vacuum Pump</span>
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
                                                id="chassis"
                                                class="toggle-checkbox hidden"
                                                type="checkbox"
                                                name = "chassis"
                                                {{$editing ? $checkListNr->chassis == true ? 'checked' : '' : ''}}
                                                {{$url_link ? 'disabled' : ''}}
                                            />
                                            <label for="chassis" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                        </div>
                                        <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                            <span class="text-sm font-medium text-gray-900">Chassis</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <div class="">
                            <label for="vehicle_check_note" class="block text-sm font-medium text-gray-700">
                                    Notes
                            </label>
                            <div class="mt-1">
                            <textarea
                                id="vehicle_check_note"
                                name="vehicle_check_note"
                                rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                {{$url_link ? 'disabled' : ''}}
                                >{{$editing ? $checkListNr->vehicle_check_note : ''}}</textarea>
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
                        var int_video_source = "{{ old('int_video', ($editing ? $checkListNr->int_video : '')) }}";
                        var ext_video_source = "{{ old('ext_video', ($editing ? $checkListNr->ext_video : '')) }}";
                    </script>
                    
                    <div class="col-span-6 sm:col-span-3 align-top" style="height : 210px">
                        <video-tag id="internal-video-tag" ></video-tag>
                    </div>
                    <input  {{$url_link ? 'disabled' : ''}} name = "int_video" id = "int_video_form"  value = "{{ old('int_video', ($editing ? $checkListNr->int_video : '')) }}" hidden>

                    {{-- Column 2 33.3%--}}
                    <div class="col-span-6 sm:col-span-3"  style="height : 210px">
                        <video-tag id="external-video-tag"></video-tag>
                    </div>
                    <input {{$url_link ? 'disabled' : ''}} name = "ext_video" id = "ext_video_form" value = "{{ old('ext_video', ($editing ? $checkListNr->ext_video : '')) }}" hidden>
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
                        @php
                            $disabled = $url_link ? 'disabled' : '';
                            $disabled = false;
                        @endphp
                        <fieldset>
                            <div class="mt-1 bg-white rounded-md shadow-sm -space-y-px">
                                {{-- <div>
                                    <label for="card-number" class="sr-only">Card number</label>
                                    <input 
                                    type="text" name="card-number" id="card-number" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-t-md bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="Card number">
                                </div> --}}
                                <div class="flex -space-x-px">
                                    <div class="w-1/2 flex-1 min-w-0 relative block w-full text-center">
                                        <span type="text" class="relative block w-full rounded-none rounded-tl-md bg-transparent focus:z-10 sm:text-sm border-gray-300">
                                            N/S
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0 text-center">
                                        <span type="text" class="relative block w-full rounded-none rounded-tr-md bg-transparent focus:z-10 sm:text-sm border-gray-300">
                                            O/S
                                        </span>
                                    </div>
                                </div>
                                <div class="flex -space-x-px">
                                    <div class="w-1/2 flex-1 min-w-0">
                                        <!-- <label for="card-expiration-date" class="sr-only">Expiration date</label>
                                        <input type="text" name="card-expiration-date" id="card-expiration-date" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="mm"> -->
                                        @if ($url_link)
                                            <x-inputs.text
                                                name="ns_1"
                                                value="{{ old('ns_1', ($editing ? $checkListNr->ns_1 : '')) }}"
                                                maxlength="255"
                                                placeholder="mm"
                                                disabled
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                            ></x-inputs.text>
                                        @else
                                            <x-inputs.text
                                                name="ns_1"
                                                value="{{ old('ns_1', ($editing ? $checkListNr->ns_1 : '')) }}"
                                                maxlength="255"
                                                placeholder="mm"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                            ></x-inputs.text>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <!-- <label for="card-cvc" class="sr-only">CVC</label>
                                        <input type="text" name="card-cvc" id="card-cvc" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="mm"> -->
                                        @if ($url_link)
                                            <x-inputs.text
                                                name="os_1"
                                                value="{{ old('os_1', ($editing ? $checkListNr->os_1 : '')) }}"
                                                maxlength="255"
                                                placeholder="mm"
                                                disabled
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                            ></x-inputs.text>
                                        @else
                                            <x-inputs.text
                                                name="os_1"
                                                value="{{ old('os_1', ($editing ? $checkListNr->os_1 : '')) }}"
                                                maxlength="255"
                                                placeholder="mm"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                            ></x-inputs.text>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex -space-x-px">
                                    <div class="w-1/2 flex-1 min-w-0">
                                        <!-- <label for="card-expiration-date" class="sr-only">Expiration date</label>
                                        <input type="text" name="card-expiration-date" id="card-expiration-date" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="mm"> -->
                                        @if($url_link)
                                            <x-inputs.text
                                                name="ns_2"
                                                value="{{ old('ns_2', ($editing ? $checkListNr->ns_2 : '')) }}"
                                                maxlength="255"
                                                placeholder="mm"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                                required
                                                disabled
                                            ></x-inputs.text>
                                        @else
                                            <x-inputs.text
                                                name="ns_2"
                                                value="{{ old('ns_2', ($editing ? $checkListNr->ns_2 : '')) }}"
                                                maxlength="255"
                                                placeholder="mm"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                                required
                                            ></x-inputs.text>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <!-- <label for="card-mm" class="sr-only">mm</label>
                                        <input type="text" name="card-cvc" id="card-cvc" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="mm"> -->
                                        @if($url_link)
                                            <x-inputs.text
                                                name="os_2"
                                                value="{{ old('os_2', ($editing ? $checkListNr->os_2 : '')) }}"
                                                maxlength="255"
                                                placeholder="mm"
                                                disabled
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                            ></x-inputs.text>
                                        @else
                                            <x-inputs.text
                                                name="os_2"
                                                value="{{ old('os_2', ($editing ? $checkListNr->os_2 : '')) }}"
                                                maxlength="255"
                                                placeholder="mm"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                            ></x-inputs.text>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex -space-x-px">
                                    <div class="w-1/2 flex-1 min-w-0">
                                        <!-- <label for="card-expiration-date" class="sr-only">Expiration date</label>
                                        <input type="text" name="card-expiration-date" id="card-expiration-date" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-bl-md bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="mm"> -->
                                        @if($url_link)
                                            <x-inputs.text
                                                name="ns_3"
                                                value="{{ old('ns_3', ($editing ? $checkListNr->ns_3 : '')) }}"
                                                maxlength="255"
                                                disabled
                                                placeholder="mm"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                            ></x-inputs.text>
                                        @else
                                            <x-inputs.text
                                                name="ns_3"
                                                value="{{ old('ns_3', ($editing ? $checkListNr->ns_3 : '')) }}"
                                                maxlength="255"
                                                placeholder="mm"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                            ></x-inputs.text>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <!-- <label for="card-cvc" class="sr-only">CVC</label>
                                        <input type="text" name="card-cvc" id="card-cvc" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="mm"> -->
                                        @if ($url_link)
                                            <x-inputs.text
                                                name="os_3"
                                                value="{{ old('os_3', ($editing ? $checkListNr->os_3 : '')) }}"
                                                maxlength="255"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                                placeholder="mm"
                                                disabled
                                            ></x-inputs.text>
                                        @else
                                            <x-inputs.text
                                                name="os_3"
                                                value="{{ old('os_3', ($editing ? $checkListNr->os_3 : '')) }}"
                                                maxlength="255"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300 py-2"
                                                placeholder="mm"
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
                        <img id="left-side-image" class="mx-auto" src="{{$editing ? $checkListNr->ext_splat_left : '/img/splat-side-1.png'}}" alt="left-side-image">
                    </a>
                    <input 
                    {{$url_link ? 'disabled' : ''}}
                    id = "left-side-image-form" name = 'ext_splat_left' hidden value = "{{$editing ? $checkListNr->ext_splat_left : '/img/splat-side-1.png'}}"/>
                </div>
            </div>
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                    <a id = "front-side"><img id="front-side-image" class="mx-auto" src="{{$editing ? $checkListNr->ext_splat_front : '/img/splat-side-front.png'}}" alt="front-side-image"></a>
                    <input 
                    {{$url_link ? 'disabled' : ''}}
                    id = "front-side-image-form" name = 'ext_splat_front' hidden value = "{{$editing ? $checkListNr->ext_splat_front : '/img/splat-side-front.png'}}" />
                </div>
            </div>

            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                        <a id = "back-side"><img id="back-side-image" class="mx-auto" src="{{$editing ? $checkListNr->ext_splat_rear : '/img/splat-rear.png'}}" alt="back-side-image"></a>
                    <input 
                        {{$url_link ? 'disabled' : ''}}
                        id = "back-side-image-form" name = 'ext_splat_rear' hidden
                        value = "{{$editing ? $checkListNr->ext_splat_rear : '/img/splat-rear.png'}}"
                    />
                </div>
            </div>

            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                        <a id = "right-side"><img id="right-side-image" class="mx-auto" 
                            src="{{$editing ? $checkListNr->ext_splat_right : '/img/splat-side-2.png'}}"
                            alt="right-side-image"></a>
                    <input
                        {{$url_link ? 'disabled' : ''}}
                        id = "right-side-image-form" name = 'ext_splat_right' hidden
                        value = "{{$editing ? $checkListNr->ext_splat_right : '/img/splat-side-2.png'}}"
                    />
                </div>
            </div>

            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="box-content rounded border-2 border-gray-300">
                        <a id = "internal"><img id="internal-image" class="mx-auto" src="{{$editing ? $checkListNr->int_splat : '/img/splat-internal.png'}}" alt="internal-image"></a>
                    <input
                        {{$url_link ? 'disabled' : ''}}
                        id = "internal-image-form" name = 'int_splat' hidden
                        value = "{{$editing ? $checkListNr->int_splat : '/img/splat-internal.png'}}"
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
    'data' => $editing ? $checkListNr : null
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