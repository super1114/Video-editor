@extends('layouts.app')

@section('content')
<main class="-mt-28 pb-8">
    <section aria-labelledby="hire-contract">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <x-slot name="title">
                <a href="{{ route('check-list-rigids.index') }}" class="mr-4"
                    ><i class="mr-1 icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.check_list_rigids.edit_title')
            </x-slot>
            
            <x-form
                method="PUT"
                action="{{ route('check-list-rigids.update', $checkListRigid) }}"
                class="mt-4"
                enctype="multipart/form-data"
            >
                <div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
                    <h2 class="sr-only" id="profile-overview-title">Hire Contract</h2>
                    <div class="bg-white p-6">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="sm:flex sm:space-x-5">
                        <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                            <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
                            <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{ $check_type }} Hire Checklist</p>
                            <p class="text-sm font-medium text-gray-400">To be completed by TCL and customer upon collection.</p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @include('app.check_list_rigids.form-inputs')
                <div class="mt-10">
                    <a href="{{ route('check-list-rigids.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('check-list-rigids.create') }}"
                        class="button"
                    >
                        <i class="mr-1 icon ion-md-add text-primary"></i>
                        @lang('crud.common.create')
                    </a>
                    @if(!isset($url_link))
                        <button type="submit" class="button button-primary float-right">
                            <i class="mr-1 icon ion-md-save"></i>
                            @lang('crud.common.update')
                        </button>
                    @endif
                </div>
            </x-form>
        </div>
    </section>
</main>
@endsection