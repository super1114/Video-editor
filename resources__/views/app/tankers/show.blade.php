@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <x-slot name="title">
            <a href="{{ route('tankers.index') }}" class="mr-4"
                ><i class="mr-1 icon ion-md-arrow-back"></i
            ></a>
            @lang('crud.tankers.show_title')
        </x-slot>

        <div class="mt-4">
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.tankers.inputs.service_interval')
                </h5>
                <span>{{ $tanker->service_interval ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.tankers.inputs.fleet_num')
                </h5>
                <span>{{ $tanker->fleet_num ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.tankers.inputs.make')</h5>
                <span>{{ $tanker->make ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.tankers.inputs.equipment')
                </h5>
                <span>{{ $tanker->equipment ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.tankers.inputs.replacement_value')
                </h5>
                <span>{{ $tanker->replacement_value ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.tankers.inputs.mot_expiry')
                </h5>
                <span>{{ $tanker->mot_expiry ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.tankers.inputs.adr_expiry')
                </h5>
                <span>{{ $tanker->adr_expiry ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.tankers.inputs.chassis_num')
                </h5>
                <span>{{ $tanker->chassis_num ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.tankers.inputs.discharge_pump')
                </h5>
                <span>{{ $tanker->discharge_pump ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.tankers.inputs.serial_num')
                </h5>
                <span>{{ $tanker->serial_num ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.tankers.inputs.tank_type')
                </h5>
                <span>{{ $tanker->tank_type ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.tankers.inputs.sector')</h5>
                <span>{{ $tanker->sector ?? '-' }}</span>
            </div>
        </div>

        <div class="mt-10">
            <a href="{{ route('tankers.index') }}" class="button">
                <i class="mr-1 icon ion-md-return-left"></i>
                @lang('crud.common.back')
            </a>

            @can('create', App\Models\Tanker::class)
            <a href="{{ route('tankers.create') }}" class="button">
                <i class="mr-1 icon ion-md-add"></i> @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </x-partials.card>
</div>
@endsection
