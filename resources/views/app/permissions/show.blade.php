@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <x-slot name="title">
            <a href="{{ route('permissions.index') }}" class="mr-4"
                ><i class="mr-1 icon ion-md-arrow-back"></i
            ></a>
            @lang('crud.permissions.show_title')
        </x-slot>

        <div class="mt-4">
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.permissions.inputs.name')
                </h5>
                <span>{{ $permission->name ?? '-' }}</span>
            </div>
        </div>

        <div class="mt-10">
            <a href="{{ route('permissions.index') }}" class="button">
                <i class="mr-1 icon ion-md-return-left"></i>
                @lang('crud.common.back')
            </a>

            @can('create', App\Models\Permission::class)
            <a href="{{ route('permissions.create') }}" class="button">
                <i class="mr-1 icon ion-md-add"></i> @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </x-partials.card>
</div>
@endsection
