@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <x-slot name="title">
            <a href="{{ route('companies.index') }}" class="mr-4"
                ><i class="mr-1 icon ion-md-arrow-back"></i
            ></a>
            @lang('crud.companies.show_title')
        </x-slot>

        <div class="mt-4">
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.companies.inputs.mobile')
                </h5>
                <span>{{ $company->mobile ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.companies.inputs.company')
                </h5>
                <span>{{ $company->company ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.companies.inputs.address')
                </h5>
                <span>{{ $company->address ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.companies.inputs.postcode')
                </h5>
                <span>{{ $company->postcode ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.companies.inputs.phone')
                </h5>
                <span>{{ $company->phone ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.companies.inputs.contact')
                </h5>
                <span>{{ $company->contact ?? '-' }}</span>
            </div>
        </div>

        <div class="mt-10">
            <a href="{{ route('companies.index') }}" class="button">
                <i class="mr-1 icon ion-md-return-left"></i>
                @lang('crud.common.back')
            </a>

            @can('create', App\Models\Company::class)
            <a href="{{ route('companies.create') }}" class="button">
                <i class="mr-1 icon ion-md-add"></i> @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </x-partials.card>
</div>
@endsection
