@php $editing = isset($user) @endphp
<div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
    <h2 class="sr-only" id="profile-overview-title">Hire Contract</h2>
    <div class="bg-white p-6">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div class="sm:flex sm:space-x-5">
        <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
            <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
            <p class="text-xl font-bold text-gray-900 sm:text-2xl">User Add/Update</p>
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
            <h3 class="text-lg font-medium leading-6 text-gray-900">Credential Information</h3>
            <p class="mt-1 text-sm text-gray-600">
                We can add some notes/instructions here.
            </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-6 gap-6 pb-6">
                        <div class="col-span-6 sm:col-span-3">
                            <div class="">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <x-inputs.text
                                    name="name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    value="{{ old('name', ($editing ? $user->name : '')) }}"
                                    maxlength="255"
                                    required
                                ></x-inputs.text>
                            </div>
                            <div class="mt-6">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <x-inputs.password
                                    name="password"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    maxlength="255"
                                    placeholder="Password"
                                    :required="!$editing"
                                ></x-inputs.password>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <div class="">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <x-inputs.text
                                    name="email"                                    
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    value="{{ old('email', ($editing ? $user->email : '')) }}"
                                    maxlength="255"
                                    required
                                ></x-inputs.text>
                            </div>
                            <div class="mt-6">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Password Confirmation</label>
                                <x-inputs.password
                                    name="password_confirmation"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    maxlength="255"
                                    placeholder="Password Confirmation"
                                ></x-inputs.password>
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

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Job Information</h3>
            <p class="mt-1 text-sm text-gray-600">
                We can add some notes/instructions here.
            </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-6 gap-6 pb-6">
                        <div class="col-span-6 sm:col-span-3">
                            <div class="">
                                <label for="company_id" class="block text-sm font-medium text-gray-700">Company</label>
                                <x-inputs.select
                                    name="company_id"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2">
                                    @php $selected = old('company_id', ($editing ? $user->company_id : '')) @endphp
                                    <option readonly {{ empty($selected) ? 'selected' : '' }}>Please select the Company</option>
                                    @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ $selected == $company->id ? 'selected' : '' }} >{{ $company->company }}</option>
                                    @endforeach
                                </x-inputs.select>
                            </div>
                        </div>
                        
                        <div class="col-span-6 sm:col-span-3">
                            <div class="">
                                <label for="jobtitle" class="block text-sm font-medium text-gray-700">Job Title</label>
                                <x-inputs.text
                                    name="jobtitle"                                    
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                    value="{{ old('jobtitle', ($editing ? $user->jobtitle : '')) }}"
                                    maxlength="255"
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

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Assign Roles</h3>
            <p class="mt-1 text-sm text-gray-600">
                We can grant roles to user here.
            </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-6 gap-6 pb-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="user_type" class="block text-sm font-medium text-gray-700">User Type</label>
                            <x-inputs.select
                                name="user_type"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                >
                                @php $selected = old('user_type', ($editing ? $user->user_type : '')) @endphp
                                <option value="admin" {{ $selected == 'admin' ? 'selected' : '' }} >Admin</option>
                                <option value="staff" {{ $selected == 'staff' ? 'selected' : '' }} >Staff</option>
                                <option value="customer" {{ $selected == 'customer' ? 'selected' : '' }} >Customer</option>                        
                            </x-inputs.select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="user_type" class="block text-sm font-medium text-gray-700">Roles</label>
                            @foreach ($roles as $role)
                            <div class="py-2">    
                                <div class="flex items-center">
                                    <div class="max-w-xl w-full -mx-auto">
                                        <div class="flex items-center" x-data="{ on: false }">
                                            <div class="toggle colour">
                                                <input
                                                    id="role{{ $role->id }}"
                                                    class="toggle-checkbox hidden"
                                                    type="checkbox"
                                                    name = "roles[]"
                                                    value="{{ $role->id }}"
                                                    {{ isset($user) ? $user->hasRole($role) ? 'checked' : '' : '' }}
                                                />
                                                <label for="role{{ $role->id }}" class="toggle-label block w-12 h-6 rounded-full transition-color duration-150 ease-out"></label>
                                            </div>
                                            <span class="flex flex-col ml-3" id="availability-label" @click="on = !on; $refs.switch.focus()">
                                                <span class="text-sm text-gray-900">{{ ucfirst($role->name) }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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


