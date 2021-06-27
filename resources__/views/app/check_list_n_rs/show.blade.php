@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <x-slot name="title">
            <a href="{{ route('check-list-n-rs.index') }}" class="mr-4"
                ><i class="mr-1 icon ion-md-arrow-back"></i
            ></a>
            @lang('crud.check_list_n_rs.show_title')
        </x-slot>

        <div class="mt-4">
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.checklist_type')
                </h5>
                <span>{{ $checkListNr->checklist_type ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.status')
                </h5>
                <span>{{ $checkListNr->status ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.cladding_panels')
                </h5>
                <span>{{ $checkListNr->cladding_panels ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.handrail_ladder')
                </h5>
                <span>{{ $checkListNr->handrail_ladder ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.compartment_internal')
                </h5>
                <span>{{ $checkListNr->compartment_internal ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.side_guards')
                </h5>
                <span>{{ $checkListNr->side_guards ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.rear_bumper')
                </h5>
                <span>{{ $checkListNr->rear_bumper ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.wings_stays')
                </h5>
                <span>{{ $checkListNr->wings_stays ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.lights')
                </h5>
                <span>{{ $checkListNr->lights ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.engine')
                </h5>
                <span>{{ $checkListNr->engine ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.vacuum_pump')
                </h5>
                <span>{{ $checkListNr->vacuum_pump ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.dipstrick')
                </h5>
                <span>{{ $checkListNr->dipstrick ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.valve_operation')
                </h5>
                <span>{{ $checkListNr->valve_operation ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.fire_extinguisher')
                </h5>
                <span>{{ $checkListNr->fire_extinguisher ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.chassis')
                </h5>
                <span>{{ $checkListNr->chassis ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.note_1')
                </h5>
                <span>{{ $checkListNr->note_1 ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.ns_1')
                </h5>
                <span>{{ $checkListNr->ns_1 ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.os_1')
                </h5>
                <span>{{ $checkListNr->os_1 ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.note_2')
                </h5>
                <span>{{ $checkListNr->note_2 ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.ns_2')
                </h5>
                <span>{{ $checkListNr->ns_2 ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.os_2')
                </h5>
                <span>{{ $checkListNr->os_2 ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.note_3')
                </h5>
                <span>{{ $checkListNr->note_3 ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.ns_3')
                </h5>
                <span>{{ $checkListNr->ns_3 ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.os_3')
                </h5>
                <span>{{ $checkListNr->os_3 ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.ext_splat_right')
                </h5>
                <span>{{ $checkListNr->ext_splat_right ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.ext_splat_left')
                </h5>
                <span>{{ $checkListNr->ext_splat_left ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.ext_splat_rear')
                </h5>
                <span>{{ $checkListNr->ext_splat_rear ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.ext_splat_front')
                </h5>
                <span>{{ $checkListNr->ext_splat_front ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.int_splat')
                </h5>
                <span>{{ $checkListNr->int_splat ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.int_video')
                </h5>
                <span>{{ $checkListNr->int_video ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.ext_video')
                </h5>
                <span>{{ $checkListNr->ext_video ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.hirer_name')
                </h5>
                <span>{{ $checkListNr->hirer_name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.hirer_position')
                </h5>
                <span>{{ $checkListNr->hirer_position ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.hirer_signature')
                </h5>
                <span>{{ $checkListNr->hirer_signature ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.hirer_sign_date')
                </h5>
                <span>{{ $checkListNr->hirer_sign_date ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.tcl_name')
                </h5>
                <span>{{ $checkListNr->tcl_name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.tcl_position')
                </h5>
                <span>{{ $checkListNr->tcl_position ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.tcl_signature')
                </h5>
                <span>{{ $checkListNr->tcl_signature ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.tcl_sign_date')
                </h5>
                <span>{{ $checkListNr->tcl_sign_date ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_n_rs.inputs.hire_id')
                </h5>
                <span
                    >{{ optional($checkListNr->hire)->start_date ?? '-' }}</span
                >
            </div>
        </div>

        <div class="mt-10">
            <a href="{{ route('check-list-n-rs.index') }}" class="button">
                <i class="mr-1 icon ion-md-return-left"></i>
                @lang('crud.common.back')
            </a>

            @can('create', App\Models\CheckListNr::class)
            <a href="{{ route('check-list-n-rs.create') }}" class="button">
                <i class="mr-1 icon ion-md-add"></i> @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </x-partials.card>
</div>
@endsection
