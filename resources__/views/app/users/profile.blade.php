@extends('layouts.app')

@section('styles')
<style>
    .avatar_wrapper {
        position: relative;
    }

    .search_avatar_icon {
        position: absolute;
        width: 30px;
        height: 30px;
        border: 1px solid transparent;
        border-radius: 30px;
        background: #000;
        opacity: 0.8;
        top: 75%;
        left: 70%;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user_avatar {
        cursor: pointer;
        transition: 0.3s;
    }
    
    .user_avatar:hover {
        opacity: 0.5
    }
</style>
@endsection

@section('content')
<main class="-mt-24 pb-8">
    <section aria-labelledby="hire-contract">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">

            {{-- START TOP CARD --}}
            <div class="mb-10 rounded-lg bg-white overflow-hidden shadow relative">
                <h2 class="sr-only" id="profile-overview-title">Your Profile</h2>
                <div class="bg-white p-6">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="sm:flex sm:space-x-5">
                            <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
                                <p class="text-xl font-bold text-gray-900 sm:text-2xl">Your Profile</p>
                                <p class="text-sm font-medium text-gray-400">.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 mb-10 rounded-lg bg-white overflow-hidden shadow">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                Use a permanent address where you can receive mail.
                                </p>
                            </div>
                            <div>               
                                <div class="mt-10 flex items-center justify-center">
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="upload_form" name="upload_form" method="POST" action="">
                                                <input type="file" id="photo" name="photo" style="display:none;" accept="image/*">
                                            </form>
                                            <div id="avatar_wrapper" class="avatar_wrapper">
                                                @if($user->photo == '')
                                                    <img src="{{ asset('img/default_avatar.png') }}" id="user_avatar" class="rounded-full user_avatar" width="150" />
                                                @else
                                                    <img src="{{ asset('storage/' . $user->photo) }}" id="user_avatar" class="rounded-full user_avatar" width="150" />
                                                @endif
                                                <span class="search_avatar_icon">
                                                    <div id="search-toggle" class="search-icon cursor-pointer pl-1">
                                                        <svg class="fill-current pointer-events-none text-grey-darkest w-4 h-4 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                                                        </svg>
                                                    </div>
                                                </span>
                                            </div> 
                                            <h4 class="text-lg font-medium md:text-center leading-6 text-gray-900">{{ $user->name}}</h4>
                                            <h6 class="mt-1 text-sm md:text-center text-gray-600">{{ $user->email }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{route('user.profileUpdate')}}" method="POST">
                                @csrf
                                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="name" class="block text-sm font-medium text-gray-700"> Name</label>
                                                <input 
                                                    type="text" 
                                                    name="name" 
                                                    id="name" 
                                                    autocomplete="given-name"
                                                    value="{{$user->name}}" 
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="email" class="block text-sm font-medium text-gray-700">
                                                Email Address
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                    email
                                                </span>
                                                <input 
                                                    type="text" 
                                                    name="email" 
                                                    id="email"
                                                    value="{{$user->email}}" 
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" 
                                                    placeholder="you@example.com">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Cover photo
                                            </label>
                                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="cover_photo" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="cover_photo" name="cover_photo" type="file" class="sr-only">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    PNG, JPG, GIF up to 10MB
                                                </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                        </button>
                                    </div>                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>                
                @role('customer')
                <div class="px-6 mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Job Information</h3>
                            <p class="mt-1 text-sm text-gray-600">
                            This information will be displayed publicly so be careful what you share.
                            </p>
                        </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{route('user.jobInfoUpdate')}}" method="POST">
                                @csrf
                                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">                                                                                   
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="company_id" class="block text-sm font-medium text-gray-700">Company</label>
                                                <select id="company_id" name="company_id" autocomplete="company_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach($companies as $company)
                                                    <option value="{{ $company->id }}" {{ $user->company_id == $company->id ? 'selected' : '' }} >{{ $company->company }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6">
                                                <label for="jobtitle" class="block text-sm font-medium text-gray-700">Job Title</label>
                                                <input 
                                                    type="text" 
                                                    name="jobtitle" 
                                                    id="jobtitle" 
                                                    value="{{$user->jobtitle}}"
                                                    autocomplete="street-address" 
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>
                @endrole
                <div class="px-6 mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Password</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                You can change your password here.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{route('user.changePwd')}}" method="POST">
                            @csrf
                                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                         
                                        <div class="">
                                            <label for="prev_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                                            <x-inputs.password
                                                name="prev_password"
                                                id="prev_password"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                                maxlength="255"
                                                placeholder="current password"
                                                required
                                            ></x-inputs.password>
                                        </div>
                                        
                                        <div class="grid grid-cols-6 gap-6 pb-6">                    
                                            <div class="col-span-6 sm:col-span-3">
                                                <div class="mt-6">
                                                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                                                    <x-inputs.password
                                                        name="password"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                                        maxlength="255"
                                                        placeholder="Password"
                                                        required
                                                    ></x-inputs.password>
                                                </div>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <div class="mt-6">
                                                    <label for="password_confirm" class="block text-sm font-medium text-gray-700">Password Confirmation</label>
                                                    <x-inputs.password
                                                        name="password_confirm"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md py-2"
                                                        maxlength="255"
                                                        placeholder="password confirmation"
                                                        required
                                                    ></x-inputs.password>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                        </button>
                                    </div>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>   
        </div>        
    </section>
</main>

<script>
    var base_url = "{{ url('/') }}";  
</script>
<script src="{{ asset('js/profile.js') }}"></script>

@endsection