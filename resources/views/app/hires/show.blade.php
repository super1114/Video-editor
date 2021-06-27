@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <x-slot name="title">
            <a href="{{ route('hires.index') }}" class="mr-4"
                ><i class="mr-1 icon ion-md-arrow-back"></i
            ></a>
            @lang('crud.hires.show_title')
        </x-slot>

        <div class="mt-4">
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.company_id')
                </h5>
                <span>{{ optional($hire->company)->company ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.tanker_id')
                </h5>
                <span>{{ optional($hire->tanker)->fleet_num ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.start_date')
                </h5>
                <span>{{ $hire->start_date ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.hires.inputs.end_date')</h5>
                <span>{{ $hire->end_date ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.delivery_date')
                </h5>
                <span>{{ $hire->delivery_date ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.hire_type')
                </h5>
                <span>{{ $hire->hire_type ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.hire_rate')
                </h5>
                <span>{{ $hire->hire_rate ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.hires.inputs.deposit')</h5>
                <span>{{ $hire->deposit ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.minimum_hire_period')
                </h5>
                <span>{{ $hire->minimum_hire_period ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.notice_period')
                </h5>
                <span>{{ $hire->notice_period ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.maintenance_included')
                </h5>
                <span>{{ $hire->maintenance_included ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.tyres_included')
                </h5>
                <span>{{ $hire->tyres_included ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.delivery_charge')
                </h5>
                <span>{{ $hire->delivery_charge ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.collection_charge')
                </h5>
                <span>{{ $hire->collection_charge ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.water_fill_charge')
                </h5>
                <span>{{ $hire->water_fill_charge ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.tyre_wear_charge')
                </h5>
                <span>{{ $hire->tyre_wear_charge ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.commissioning_charge')
                </h5>
                <span>{{ $hire->commissioning_charge ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.cleaning_outside_charge')
                </h5>
                <span>{{ $hire->cleaning_outside_charge ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.cleanout_charge')
                </h5>
                <span>{{ $hire->cleanout_charge ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.other_charge')
                </h5>
                <span>{{ $hire->other_charge ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.charge_notes')
                </h5>
                <span>{{ $hire->charge_notes ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.delivery_address')
                </h5>
                <span>{{ $hire->delivery_address ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.delivery_postcode')
                </h5>
                <span>{{ $hire->delivery_postcode ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.delivery_phone')
                </h5>
                <span>{{ $hire->delivery_phone ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.delivery_email')
                </h5>
                <span>{{ $hire->delivery_email ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.delivery_fax')
                </h5>
                <span>{{ $hire->delivery_fax ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.delivery_contact_name')
                </h5>
                <span>{{ $hire->delivery_contact_name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.hires.inputs.insurer')</h5>
                <span>{{ $hire->insurer ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.policy_num')
                </h5>
                <span>{{ $hire->policy_num ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.hires.inputs.broker')</h5>
                <span>{{ $hire->broker ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.policy_type')
                </h5>
                <span>{{ $hire->policy_type ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.policy_expiry')
                </h5>
                <span>{{ $hire->policy_expiry ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.policy_value')
                </h5>
                <span>{{ $hire->policy_value ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.policy_notes')
                </h5>
                <span>{{ $hire->policy_notes ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.hirer_name')
                </h5>
                <span>{{ $hire->hirer_name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.hirer_position')
                </h5>
                <span>{{ $hire->hirer_position ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.hirer_signature')
                </h5>
                <span>{{ $hire->hirer_signature ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.hirer_sign_date')
                </h5>
                <span>{{ $hire->hirer_sign_date ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.hires.inputs.hirer_ip')</h5>
                <span>{{ $hire->hirer_ip ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.hirer_geo')
                </h5>
                <span>{{ $hire->hirer_geo ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">@lang('crud.hires.inputs.tcl_name')</h5>
                <span>{{ $hire->tcl_name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.tcl_position')
                </h5>
                <span>{{ $hire->tcl_position ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.tcl_signature')
                </h5>
                <span>{{ $hire->tcl_signature ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.hires.inputs.tcl_sign_date')
                </h5>
                <span>{{ $hire->tcl_sign_date ?? '-' }}</span>
            </div>
        </div>

        <div class="mt-10">
            <a href="{{ route('hires.index') }}" class="button">
                <i class="mr-1 icon ion-md-return-left"></i>
                @lang('crud.common.back')
            </a>

            @can('create', App\Models\Hire::class)
            <a href="{{ route('hires.create') }}" class="button">
                <i class="mr-1 icon ion-md-add"></i> @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </x-partials.card>
</div>
@endsection
