@extends('layouts.app')

@section('content')
<main class="-mt-28 pb-8">
    <section aria-labelledby="hire-contract">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <x-slot name="title">
                @lang('crud.contracts.title')
            </x-slot>

            <x-form
                method="PUT"
                action="{{ route('contract.store', $hire) }}"
                class="mt-4"
            >
                @include('app.contracts.form-inputs')
                <div class="mt-10">
                    <button type="submit" class="button button-primary float-right">
                        <i class="mr-1 icon ion-md-save"></i>
                        @lang('crud.common.sign')
                    </button>
                </div>
            </x-form>
        </div>
    </section>
</main>
@endsection
