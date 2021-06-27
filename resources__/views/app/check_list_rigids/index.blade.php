@extends('layouts.app')

@section('content')


<!-- <main class="-mt-28 pb-8">
    <section aria-labelledby="hire-contract">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <x-slot name="title">
                @lang('crud.check_list_rigids.index_title')
            </x-slot>
        </div>
        <div class="mx-auto px-4 md:px-6">
            <div class="flex justify-between">
                <x-slot name="title">
                    @lang('crud.check_list_rigids.index_title')
                </x-slot>
            </div>
            <main class="-mt-24 pb-8">
    <section aria-labelledby="hire-contract"> -->

<main class="-mt-24 pb-8">
	<section aria-labelledby="hire-contract">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        {{-- START TOP CARD --}}
        <div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
            <h2 class="sr-only" id="profile-overview-title">@lang('crud.check_list_rigids.index_title')</h2>
            <div class="bg-white p-6">
              <div class="sm:flex sm:items-center sm:justify-between">
                <div class="sm:flex sm:space-x-5">
                  <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                    <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
                    <p class="text-xl font-bold text-gray-900 sm:text-2xl">@lang('crud.check_list_rigids.index_title')</p>
                    <p class="text-sm font-medium text-gray-400">.</p>
                  </div>
                </div>
              </div>

              {{-- END SEARCH --}}
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
													@can('create', App\Models\CheckListRigid::class)
													<a
															href="{{ route('check-list-rigids.create') }}"
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
																	@lang('crud.check_list_rigids.inputs.checklist_type')
															</th>
															<th class="px-4 py-3 text-left">
																	@lang('crud.check_list_rigids.inputs.status_string')
															</th>
															<th class="px-4 py-3 text-left">
																	@lang('crud.check_list_rigids.inputs.hirer_name')
															</th>
															<th class="px-4 py-3 text-left">
																	@lang('crud.check_list_rigids.inputs.hirer_position')
															</th>
															<th class="px-4 py-3 text-left">
																	@lang('crud.check_list_rigids.inputs.hirer_signature')
															</th>
															<th class="px-4 py-3 text-left">
																	@lang('crud.check_list_rigids.inputs.hirer_sign_date')
															</th>
															<th class="px-4 py-3 text-left">
																	@lang('crud.check_list_rigids.inputs.tcl_name')
															</th>
															<th class="px-4 py-3 text-left">
																	@lang('crud.check_list_rigids.inputs.tcl_position')
															</th>
															<th class="px-4 py-3 text-left">
																	@lang('crud.check_list_rigids.inputs.tcl_signature')
															</th>
															<th class="px-4 py-3 text-left">
																	@lang('crud.check_list_rigids.inputs.tcl_sign_date')
															</th>
															<th class="px-4 py-3 text-center">
																	@lang('crud.common.actions')
															</th>
													</tr>
											</thead>
											<tbody>
													@forelse($checkListRigids as $checkListRigid)
													<tr class="hover:bg-gray-50">
															<td class="px-4 py-3 text-left">
																	{{ $checkListRigid->checklist_type ?? '-' }}
															</td>
															<td class="px-4 py-3 text-left">
																	{{ $checkListRigid->status_string ?? '-' }}
															</td>
															<td class="px-4 py-3 text-left">
																	{{ $checkListRigid->hirer_name ?? '-' }}
															</td>
															<td class="px-4 py-3 text-left">
																	{{ $checkListRigid->hirer_position ?? '-' }}
															</td>
															<td class="px-4 py-3 text-left">
																	{{ $checkListRigid->hirer_signature ?? '-' }}
															</td>
															<td class="px-4 py-3 text-left">
																	{{ $checkListRigid->hirer_sign_date ?? '-' }}
															</td>
															<td class="px-4 py-3 text-left">
																	{{ $checkListRigid->tcl_name ?? '-' }}
															</td>
															<td class="px-4 py-3 text-left">
																	{{ $checkListRigid->tcl_position ?? '-' }}
															</td>
															<td class="px-4 py-3 text-left">
																	{{ $checkListRigid->tcl_signature ?? '-' }}
															</td>
															<td class="px-4 py-3 text-left">
																	{{ $checkListRigid->tcl_sign_date ?? '-' }}
															</td>
															<td class="px-4 py-3 text-center" style="width: 134px;">
																	<div
																			role="group"
																			aria-label="Row Actions"
																			class="relative inline-flex align-middle"
																	>
																			@can('update', $checkListRigid)
																			<a
																					href="{{ route('check-list-rigids.edit', $checkListRigid) }}"
																					class="mr-1"
																			>
																					<button type="button" class="button">
																							<i class="icon ion-md-create"></i>
																					</button>
																			</a>
																			@endcan @can('view', $checkListRigid)
																			<a
																					href="{{ route('check-list-rigids.show', $checkListRigid) }}"
																					class="mr-1"
																			>
																					<button type="button" class="button">
																							<i class="icon ion-md-eye"></i>
																					</button>
																			</a>
																			@endcan @can('delete', $checkListRigid)
																			<form
																					action="{{ route('check-list-rigids.destroy', $checkListRigid) }}"
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
															<td colspan="11">
																	@lang('crud.common.no_items_found')
															</td>
													</tr>
													@endforelse
											</tbody>
											<tfoot>
													<tr>
															<td class="pt-10" colspan="11">
																	{!! $checkListRigids->render() !!}
															</td>
													</tr>
											</tfoot>
									</table>
							</div>
						</div>
					</div>
        </div>
			</div>
		</div>
	</section>
</main>
@endsection
