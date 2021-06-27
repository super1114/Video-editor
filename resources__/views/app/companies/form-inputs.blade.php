@php $editing = isset($company) @endphp

<div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
    <h2 class="sr-only" id="profile-overview-title">Hire Contract</h2>
    <div class="bg-white p-6">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div class="sm:flex sm:space-x-5">
        <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
            <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
            <p class="text-xl font-bold text-gray-900 sm:text-2xl">Company Add/Update</p>
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
            <h3 class="text-lg font-medium leading-6 text-gray-900">Company Information</h3>
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
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                    <x-inputs.text
                                        name="company"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                        value="{{ old('company', ($editing ? $company->company : '')) }}"
                                        maxlength="255"
                                        required
                                    ></x-inputs.text>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <x-inputs.text
                                        name="email"                                    
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                        value="{{ old('email', ($editing ? $company->email : '')) }}"
                                        maxlength="255"
                                        required
                                    ></x-inputs.text>
                                </div>
                            </div>                            
                            <div class="grid grid-cols-6 gap-6 pt-6 pb-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                    <x-inputs.text
                                        name="phone"                                    
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                        value="{{ old('phone', ($editing ? $company->phone : '')) }}"
                                        maxlength="255"
                                        required
                                        >
                                    </x-inputs.text>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                                    <x-inputs.text
                                        name="mobile"                                    
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                        value="{{ old('mobile', ($editing ? $company->mobile : '')) }}"
                                        maxlength="255"
                                        required
                                    ></x-inputs.text>
                                </div>
                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <input
                                        name="address" 
                                        type="text"
                                        id="autocomplete"                                   
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                        value="{{ old('address', ($editing ? $company->address : '')) }}"
                                        maxlength="255"
                                        placeholder="Enter your address" 
                                        onFocus="geolocate()"
                                        required
                                    ></input>
                                </div>
                                <div class="col-span-6 sm:col-span-3" id="address">
                                    <label for="postcode" class="block text-sm font-medium text-gray-700">Postcode</label>
                                    <input
                                        name="postcode"
                                        type="text"
                                        id="postal_code"                                    
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                        value="{{ old('postcode', ($editing ? $company->postcode : '')) }}"
                                        maxlength="255"
                                        required
                                    ></input>
                                </div>
                            </div>                            
                            <div class="mt-6">
                                <label for="contact" class="block text-sm font-medium text-gray-700">Contact</label>
                                <x-inputs.text
                                    name="contact"                                    
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    value="{{ old('contact', ($editing ? $company->contact : '')) }}"
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4bdWkWTtKiFzAsAVH9BBo6SRcovj_QGk&libraries=places&callback=initAutocomplete" async defer></script>
<script src="{{ asset('js/auto-complete.js') }}"></script>