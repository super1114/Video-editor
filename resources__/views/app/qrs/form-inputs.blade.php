@php $editing = isset($qr) @endphp

<div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
    <h2 class="sr-only" id="profile-overview-title">Hire Contract</h2>
    <div class="bg-white p-6">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div class="sm:flex sm:space-x-5">
        <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
            <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
            <p class="text-xl font-bold text-gray-900 sm:text-2xl">QR Code Add/Update</p>
            <p class="text-sm font-medium text-gray-400">To be completed by TCL and customer.</p>
        </div>
        </div>
    </div>
    </div>
</div>
<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">QR Code Information</h3>
            <p class="mt-1 text-sm text-gray-600">
                We can add some notes/instructions here.
            </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-6 gap-6 pb-6">
                        <div class="col-span-6 sm:col-span-6">
                            <div class="">
                                <label for="tankers_id" class="block text-sm font-medium text-gray-700">Tank Id</label>
                                <x-inputs.select
                                    name="tankers_id"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    maxlength="255"
                                    >
                                    @php $selected = old('tankers_id', ($editing ? $qr->tankers_id : '')) @endphp
                                    <option readonly {{ empty($selected) ? 'selected' : '' }}>Please select the Tank Id</option>
                                    @foreach($tankers as $tanker)
                                    <option value="{{ $tanker->id }}" {{ $selected == $tanker->id ? 'selected' : '' }} >{{ $tanker->id }}</option>
                                    @endforeach
                                </x-inputs.select>
                            </div>
                            <div class="mt-6">
                                <label for="label" class="block text-sm font-medium text-gray-700">Label</label>
                                <x-inputs.text
                                    name="label"                                    
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    value="{{ old('label', ($editing ? $qr->label : '')) }}"
                                    maxlength="255"
                                    required
                                ></x-inputs.text>
                            </div>
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

