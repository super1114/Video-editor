@extends('layouts.app')

@section('content')
<main class="-mt-28 pb-8">
    <section aria-labelledby="hire-contract">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <x-slot name="title">
                <a href="{{ route('qrs.index') }}" class="mr-4"
                    ><i class="mr-1 icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.qrs.edit_title')
            </x-slot>

            <x-form
                method="PUT"
                action="{{ route('qrs.update', $qr) }}"
                class="mt-4"
            >
                @include('app.qrs.form-inputs')

                <div class="mt-10">
                    <a href="{{ route('qrs.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a href="{{ route('qrs.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add text-primary"></i>
                        @lang('crud.common.create')
                    </a>

                    <button type="submit" class="button button-primary float-right">
                        <i class="mr-1 icon ion-md-save"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
        </div>
    </section>
</main>
@endsection
