<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Signatures</h3>
        <p class="mt-1 text-sm text-gray-600">
            To be signed by TCL and customer/driver.
        </p>
        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">

            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-6 gap-6 pb-6">
                    {{-- Column 1 50% --}}
                    <div class="col-span-6 sm:col-span-3">
                        <div class="">
                            <label for="hirer_name" class="block text-sm font-medium text-gray-700">Name</label>
                            <x-inputs.text
                                name="hirer_name"
                                value="{{ old('hirer_name', ($editing ? $data->hirer_name : '')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="hirer_position" class="block text-sm font-medium text-gray-700">Position</label>
                            <x-inputs.text
                                name="hirer_position"
                                value="{{ old('hirer_position', ($editing ? $data->hirer_position : '')) }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                maxlength="255"
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="hirer_behalf" class="block text-sm font-medium text-gray-700">For &amp; on behalf of (customer)</label>
                            <x-inputs.text
                                name="hirer_behalf"
                                value="{{ old('hirer_behalf', ($editing ? $data->hirer_behalf : '')) }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                maxlength="255"
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6" readonly>
                            <label for="about" class="block text-sm font-medium text-gray-700">
                                Signature
                            </label>
                            <div class="mt-1 border border-gray-200" readonly>
                              <a id = "hirer_signature">
                                  <img id="hirer_signature-image" class="mx-auto"
                                    src="{{old('hirer_signature', $editing ? ($data->hirer_signature && str_contains($data->hirer_signature, '/')) ? $data->hirer_signature : '/img/sign.png' : '/img/sign.png')}}" alt="hirer_signature-image">
                              </a>
                              <input id = "hirer_signature-image-form" name = 'hirer_signature' hidden
                                value = "{{old('hirer_signature', $editing ? $data->hirer_signature : '/img/sign.png')}}" readonly/>
                            </div>
                        </div>
                        <div class="mt-6">
                            <label for="hirer_sign_date" class="block text-sm font-medium text-gray-700">Date</label>
                            <x-inputs.date
                                name="hirer_sign_date"
                                value="{{ old('hirer_sign_date', ($editing ? optional($data->hirer_sign_date)->format('Y-m-d') : '')) }}"
                                max="255"
                                class="form-date mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            ></x-inputs.date>
                        </div>
                    </div>
                    {{-- Column 2 50%--}}
                    <div class="col-span-6 sm:col-span-3">
                        <div class="">
                            <label for="tcl_name" class="block text-sm font-medium text-gray-700">Name</label>
                            <x-inputs.text
                                name="tcl_name"
                                value="{{ old('tcl_name', ($editing ? $data->tcl_name : Auth::user()->name )) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 {{ isset($signing) ? 'bg-gray-200 md:bg-gray-200' : ''}}"
                                readonly                                
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="tcl_position" class="block text-sm font-medium text-gray-700">Position</label>
                            <x-inputs.text
                                name="tcl_position"
                                value="{{ old('tcl_position', ($editing ? $data->tcl_position : Auth::user()->jobtitle)) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 {{ isset($signing) ? 'bg-gray-200 md:bg-gray-200' : ''}}"
                                readonly
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="tcl_behalf" class="block text-sm font-medium text-gray-700">For &amp; on behalf of</label>
                            <x-inputs.text
                                name="tcl_behalf"
                                value="{{ old('tcl_behalf', ($editing ? $data->tcl_behalf ?  $data->tcl_behalf : 'TCL Tanker Rental Limited' : 'TCL Tanker Rental Limited')) }}"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 {{ isset($signing) ? 'bg-gray-200 md:bg-gray-200' : ''}}"
                                readonly
                            ></x-inputs.text>
                        </div>
                        <div class="mt-6">
                            <label for="about" class="block text-sm font-medium text-gray-700">
                                Signature
                            </label>
                            <div class="mt-1 border border-gray-200">
                                @if(!isset($signing))
                                    <a id = "tcl_signature">
                                        <img id="tcl_signature-image" class="mx-auto"
                                            src="{{old('tcl_signature', $editing ? ($data->tcl_signature && str_contains($data->tcl_signature, '/')) ? $data->tcl_signature : '/img/sign.png' : '/img/sign.png')}}" alt="tcl_signature-image">
                                    </a>
                                @else
                                <img id="tcl_signature-image" class="mx-auto"
                                            src="{{old('tcl_signature', $editing ? ($data->tcl_signature && str_contains($data->tcl_signature, '/')) ? $data->tcl_signature : '/img/sign.png' : '/img/sign.png')}}" alt="tcl_signature-image">
                                 
                                @endif
                              <input id = "tcl_signature-image-form" name = 'tcl_signature' hidden
                                value = "{{old('tcl_signature', $editing ? $data->tcl_signature : '/img/sign.png')}}"/>
                            </div>
                        </div>
                        <div class="mt-6">
                            <label for="tcl_sign_date" class="block text-sm font-medium text-gray-700">Date</label>
                            @if(!isset($signing))
                            <x-inputs.date
                                name="tcl_sign_date"
                                value="{{ old('tcl_sign_date', ($editing ? optional($data->tcl_sign_date)->format('Y-m-d') : '' )) }}"
                                max="255"                                                                
                                class="form-date mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                            ></x-inputs.date>
                            @else
                            <input
                                name="tcl_sign_date"
                                type="text"
                                value="{{ old('tcl_sign_date', ($editing ? optional($data->tcl_sign_date)->format('Y-m-d') : '' )) }}"
                                max="255"
                                readonly                                                                
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2 bg-gray-200 md:bg-gray-200"
                            ></input>    
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>