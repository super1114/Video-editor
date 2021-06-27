@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <x-slot name="title">
            <a href="{{ route('settings.index') }}" class="mr-4"
                ><i class="mr-1 icon ion-md-arrow-back"></i
            ></a>
            @lang('crud.settings.show_title')
        </x-slot>

        <div class="mt-4">
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.settings.inputs.title')</h5>
                <span>{{ $setting->title ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.settings.inputs.value')</h5>
                <span>{{ $setting->value ?? '-' }}</span>
            </div>
        </div>

        <div class="mt-10">
            <a href="{{ route('settings.index') }}" class="button">
                <i class="mr-1 icon ion-md-return-left"></i>
                @lang('crud.common.back')
            </a>

            @can('create', App\Models\Setting::class)
            <a href="{{ route('settings.create') }}" class="button">
                <i class="mr-1 icon ion-md-add"></i> @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </x-partials.card>
</div>
@endsection
