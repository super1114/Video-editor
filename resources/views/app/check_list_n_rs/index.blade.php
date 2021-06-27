@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-6">
    <x-partials.card>
        <div class="flex justify-between">
            <x-slot name="title">
                @lang('crud.check_list_n_rs.index_title')
            </x-slot>
        </div>

        <div class="mt-4 mb-5">
            <div class="flex flex-wrap">
                <div class="md:w-1/2">
                    <form>
                        <div class="flex items-stretch w-full">
                            <x-inputs.text
                                id="indexSearch"
                                name="search"
                                value="{{ $search ?? '' }}"
                                placeholder="{{ __('crud.common.search') }}"
                                autocomplete="off"
                            ></x-inputs.text>

                            <div class="ml-1">
                                <button
                                    type="submit"
                                    class="button button-primary"
                                >
                                    <i class="icon ion-md-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="md:w-1/2 text-right">
                    @can('create', App\Models\CheckListNr::class)
                    <a
                        href="{{ route('check-list-n-rs.create') }}"
                        class="button button-primary"
                    >
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="block w-full overflow-auto scrolling-touch">
            <table class="w-full max-w-full mb-4 bg-transparent">
                <thead>
                    <tr>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.checklist_type')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.status')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.cladding_panels')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.handrail_ladder')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.compartment_internal')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.side_guards')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.rear_bumper')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.wings_stays')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.lights')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.engine')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.vacuum_pump')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.dipstrick')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.valve_operation')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.fire_extinguisher')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.chassis')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.note_1')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.ns_1')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.os_1')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.note_2')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.ns_2')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.os_2')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.note_3')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.ns_3')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.os_3')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.ext_splat_right')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.ext_splat_left')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.ext_splat_rear')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.ext_splat_front')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.int_splat')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.int_video')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.ext_video')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.hirer_name')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.hirer_position')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.hirer_signature')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.hirer_sign_date')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.tcl_name')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.tcl_position')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.tcl_signature')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.tcl_sign_date')
                        </th>
                        <th class="px-4 py-3 text-left">
                            @lang('crud.check_list_n_rs.inputs.hire_id')
                        </th>
                        <th class="px-4 py-3 text-center">
                            @lang('crud.common.actions')
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($checkListNRs as $checkListNr)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->checklist_type ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->status ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->cladding_panels ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->handrail_ladder ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->compartment_internal ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->side_guards ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->rear_bumper ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->wings_stays ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->lights ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->engine ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->vacuum_pump ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->dipstrick ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->valve_operation ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->fire_extinguisher ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->chassis ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->note_1 ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->ns_1 ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->os_1 ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->note_2 ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->ns_2 ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->os_2 ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->note_3 ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->ns_3 ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->os_3 ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->ext_splat_right ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->ext_splat_left ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->ext_splat_rear ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->ext_splat_front ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->int_splat ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->int_video ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->ext_video ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->hirer_name ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->hirer_position ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->hirer_signature ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->hirer_sign_date ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->tcl_name ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->tcl_position ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->tcl_signature ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ $checkListNr->tcl_sign_date ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-left">
                            {{ optional($checkListNr->hire)->start_date ?? '-'
                            }}
                        </td>
                        <td class="px-4 py-3 text-center" style="width: 134px;">
                            <div
                                role="group"
                                aria-label="Row Actions"
                                class="relative inline-flex align-middle"
                            >
                                @can('update', $checkListNr)
                                <a
                                    href="{{ route('check-list-n-rs.edit', $checkListNr) }}"
                                    class="mr-1"
                                >
                                    <button type="button" class="button">
                                        <i class="icon ion-md-create"></i>
                                    </button>
                                </a>
                                @endcan @can('view', $checkListNr)
                                <a
                                    href="{{ route('check-list-n-rs.show', $checkListNr) }}"
                                    class="mr-1"
                                >
                                    <button type="button" class="button">
                                        <i class="icon ion-md-eye"></i>
                                    </button>
                                </a>
                                @endcan @can('delete', $checkListNr)
                                <form
                                    action="{{ route('check-list-n-rs.destroy', $checkListNr) }}"
                                    method="POST"
                                    onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                >
                                    @csrf @method('DELETE')
                                    <button type="submit" class="button">
                                        <i
                                            class="icon ion-md-trash text-red-600"
                                        ></i>
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="41">
                            @lang('crud.common.no_items_found')
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td class="pt-10" colspan="41">
                            {!! $checkListNRs->render() !!}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </x-partials.card>
</div>
@endsection
