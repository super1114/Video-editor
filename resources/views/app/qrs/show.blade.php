@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <x-slot name="title">
            <a href="{{ route('qrs.index') }}" class="mr-4"
                ><i class="mr-1 icon ion-md-arrow-back"></i
            ></a>
            @lang('crud.qrs.show_title')
        </x-slot>

        <div class="mt-4">
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.qrs.inputs.tankers_id')</h5>
                <span>{{ $qr->tankers_id ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.qrs.inputs.label')</h5>
                <span>{{ $qr->label ?? '-' }}</span>
            </div>
        </div>

        <div class="mt-10">
            <a href="{{ route('qrs.index') }}" class="button">
                <i class="mr-1 icon ion-md-return-left"></i>
                @lang('crud.common.back')
            </a>

            @can('create', App\Models\Qr::class)
            <a href="{{ route('qrs.create') }}" class="button">
                <i class="mr-1 icon ion-md-add"></i> @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </x-partials.card>
</div>
@endsection
