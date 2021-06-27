@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <x-slot name="title">
            <a href="{{ route('check-list-rigids.index') }}" class="mr-4"
                ><i class="mr-1 icon ion-md-arrow-back"></i
            ></a>
            @lang('crud.check_list_rigids.show_title')
        </x-slot>

        <div class="mt-4">
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_rigids.inputs.checklist_type')
                </h5>
                <span>{{ $checkListRigid->checklist_type ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_rigids.inputs.status_string')
                </h5>
                <span>{{ $checkListRigid->status_string ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_rigids.inputs.hirer_name')
                </h5>
                <span>{{ $checkListRigid->hirer_name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_rigids.inputs.hirer_position')
                </h5>
                <span>{{ $checkListRigid->hirer_position ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_rigids.inputs.hirer_signature')
                </h5>
                <span>{{ $checkListRigid->hirer_signature ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_rigids.inputs.hirer_sign_date')
                </h5>
                <span>{{ $checkListRigid->hirer_sign_date ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_rigids.inputs.tcl_name')
                </h5>
                <span>{{ $checkListRigid->tcl_name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_rigids.inputs.tcl_position')
                </h5>
                <span>{{ $checkListRigid->tcl_position ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_rigids.inputs.tcl_signature')
                </h5>
                <span>{{ $checkListRigid->tcl_signature ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('crud.check_list_rigids.inputs.tcl_sign_date')
                </h5>
                <span>{{ $checkListRigid->tcl_sign_date ?? '-' }}</span>
            </div>
        </div>

        <div class="mt-10">
            <a href="{{ route('check-list-rigids.index') }}" class="button">
                <i class="mr-1 icon ion-md-return-left"></i>
                @lang('crud.common.back')
            </a>

            @can('create', App\Models\CheckListRigid::class)
            <a href="{{ route('check-list-rigids.create') }}" class="button">
                <i class="mr-1 icon ion-md-add"></i> @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </x-partials.card>
</div>
@endsection
