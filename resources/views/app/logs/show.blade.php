@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <x-slot name="title">
            <a href="{{ route('logs.index') }}" class="mr-4"
                ><i class="mr-1 icon ion-md-arrow-back"></i
            ></a>
            @lang('crud.logs.show_title')
        </x-slot>

        <div class="mt-4"></div>

        <div class="mt-10">
            <a href="{{ route('logs.index') }}" class="button">
                <i class="mr-1 icon ion-md-return-left"></i>
                @lang('crud.common.back')
            </a>

            @can('create', App\Models\Log::class)
            <a href="{{ route('logs.create') }}" class="button">
                <i class="mr-1 icon ion-md-add"></i> @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </x-partials.card>
</div>
@endsection
