@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <x-slot name="title">
            <a href="{{ route('roles.index') }}" class="mr-4"
                ><i class="mr-1 icon ion-md-arrow-back"></i
            ></a>
            @lang('crud.roles.edit_title')
        </x-slot>

        <x-form
            method="PUT"
            action="{{ route('roles.update', $role) }}"
            class="mt-4"
        >
            @include('app.roles.form-inputs')

            <div class="mt-10">
                <a href="{{ route('roles.index') }}" class="button">
                    <i class="mr-1 icon ion-md-return-left text-primary"></i>
                    @lang('crud.common.back')
                </a>

                <a href="{{ route('roles.create') }}" class="button">
                    <i class="mr-1 icon ion-md-add text-primary"></i>
                    @lang('crud.common.create')
                </a>

                <button type="submit" class="button button-primary float-right">
                    <i class="mr-1 icon ion-md-save"></i>
                    @lang('crud.common.update')
                </button>
            </div>
        </x-form>
    </x-partials.card>
</div>
@endsection
