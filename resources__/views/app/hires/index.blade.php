@extends('layouts.app')

@section('content')

<main class="-mt-24 pb-8">
    <section aria-labelledby="hire-contract">

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">

        {{-- START TOP CARD --}}
        <div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
            <h2 class="sr-only" id="profile-overview-title">@lang('crud.hires.index_title')</h2>
            <div class="bg-white p-6">
              <div class="sm:flex sm:items-center sm:justify-between">
                <div class="sm:flex sm:space-x-5">
                  <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                    <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
                    <p class="text-xl font-bold text-gray-900 sm:text-2xl">@lang('crud.hires.index_title')</p>
                    <p class="text-sm font-medium text-gray-400">.</p>
                  </div>
                </div>
              </div>

              {{-- START SEARCH --}}
              <div class="md:w-full">
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
              {{-- END SEARCH --}}

              <div class="mt-4 mb-5">
                <div class="flex flex-wrap">
                    <div class="md:w-full text-right">
                        @can('create', App\Models\Tanker::class)
                        <a
                            href="{{ route('hires.create') }}"
                            class="button button-primary"
                        >
                            <i class="mr-1 icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            	</div>

              {{-- START CONTENT IN TOP CARD --}}
              {{-- <div class="block w-full overflow-auto scrolling-touch">
                <table class="w-full max-w-full mb-4 bg-transparent">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left">
                                @lang('crud.hires.inputs.company_id')
                            </th>
                            <th class="px-4 py-3 text-left">
                                @lang('crud.hires.inputs.tanker_id')
                            </th>
                            <th class="px-4 py-3 text-left">
                                @lang('crud.hires.inputs.status')
                            </th>
                            <th class="px-4 py-3 text-left">
                                @lang('crud.hires.inputs.start_date')
                            </th>
                            <th class="px-4 py-3 text-left">
                                @lang('crud.hires.inputs.end_date')
                            </th>
                            <th class="px-4 py-3 text-left">
                                @lang('crud.hires.inputs.delivery_date')
                            </th>
                            <th class="px-4 py-3 text-left">
                                @lang('crud.hires.inputs.hire_type')
                            </th>
                            <th class="px-4 py-3 text-right">
                                @lang('crud.hires.inputs.hire_rate')
                            </th>
                            <th class="px-4 py-3 text-left">
                                @lang('crud.hires.inputs.maintenance_included')
                            </th>
                            <th class="px-4 py-3 text-left">
                                @lang('crud.hires.inputs.tyres_included')
                            </th>
                            <th class="px-4 py-3 text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($hires as $hire)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-left">
                                {{ optional($hire->company)->company ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-left">
                                {{ optional($hire->tanker)->fleet_num ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-left">
                                {{ optional($hire->tanker)->status ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-left">
                                {{ $hire->start_date ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-left">
                                {{ $hire->end_date ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-left">
                                {{ $hire->delivery_date ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-left">
                                {{ $hire->hire_type ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-right">
                                {{ $hire->hire_rate ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-left">
                                {{ $hire->maintenance_included ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-left">
                                {{ $hire->tyres_included ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="relative inline-flex align-middle"
                                >
                                    @can('update', $hire)
                                    <a
                                        href="{{ route('hires.edit', $hire) }}"
                                        class="mr-1"
                                    >
                                        <button type="button" class="button">
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $hire)
                                    <a
                                        href="{{ route('hires.show', $hire) }}"
                                        class="mr-1"
                                    >
                                        <button type="button" class="button">
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $hire)
                                    <form
                                        action="{{ route('hires.destroy', $hire) }}"
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
                                {!! $hires->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div> --}}
              {{-- END CONTENT IN TOP CARD --}}
            </div>
        <!-- </div> -->
        {{-- END TOP CARD --}}

        {{-- START CARD 2 --}}
        {{-- start table --}}
        <!-- <div class="bg-white shadow overflow-hidden sm:rounded-md"> -->
        
            <ul class="divide-y divide-gray-200">
            @forelse($hires as $hire)            
            <li>                
                <a href="{{ route('hires.edit', $hire) }}" class="block hover:bg-gray-50">
                <div class="flex items-center px-4 py-4 sm:px-6">
                    <div class="min-w-0 flex-1 flex items-center">
                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                        <div>
                            <p class="text-base font-medium text-cyan-600">{{ $hire->company->company }}</p>
                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                <span class="font-semibold mr-1">Fleet Num:</span><span class="">{{ optional($hire->tanker)->fleet_num ?? '-' }}</span><span class="font-semibold ml-4 mr-1">Contract:</span><span class="">{{$hire->order_num}}</span>
                            </p>
                        </div>
                        <div class="hidden">
                            <p> {{ $hire->tanker->fleet_num }} </p>
                        </div>
                        <div class="hidden md:block">
                            <div>
                                <p class="text-sm text-gray-900">
                                Start
                                <time class="ml-1 mr-12 text-gray-600" datetime="2020-01-07">{{ $hire->start_date->format('dS M Y') ?? '-' }}</time>
                                End
                                <time class="ml-1 text-gray-600" datetime="2020-01-07">{{ $hire->end_date->format('dS M Y') ?? '-' }}</time>
                                </p>
                                <p class="mt-2 flex items-center text-sm text-gray-500">
                                <!-- Heroicon name: solid/check-circle -->

                                @php 
                                    $icon_contract = "text-gray-200";
                                    $icon_onHire = "text-gray-200";
                                    $icon_offHire = "text-gray-200";

                                    switch($hire->status) {
                                        case "draft":
                                            $icon_contract = "text-gray-200";
                                            $icon_onHire = "text-gray-200";
                                            $icon_offHire = "text-gray-200";
                                            break;
                                        case "pending":
                                            $icon_contract = "text-green-200";
                                            $icon_onHire = "text-gray-200";
                                            $icon_offHire = "text-gray-200";
                                            break;
                                        case "signed":
                                            $icon_contract = "text-green-400";
                                            $icon_onHire = "text-yellow-200";
                                            $icon_offHire = "text-gray-200";
                                            break;     
                                        case "onHire":
                                            $icon_contract = "text-green-400";
                                            $icon_onHire = "text-yellow-400";
                                            $icon_offHire = "text-red-200";
                                            break;
                                        case "offHire":
                                            $icon_contract = "text-green-400";
                                            $icon_onHire = "text-yellow-400";
                                            $icon_offHire = "text-red-400";
                                            break;                                    
                                    }
                                @endphp
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 {{ $icon_contract }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Contract
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 {{ $icon_onHire }} ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                On Hire
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 {{ $icon_offHire }} ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                Off Hire
                            </div>
                        </div>
                    </div>
                    </div>
                    <div>
                    <!-- Heroicon name: solid/chevron-right -->
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    </div>
                </div>
                </a>
            </li>
            @empty
            <tr>
                <td colspan="11" class="container mx-auto">
                    <span class="px-10">@lang('crud.common.no_items_found')</span>
                </td>
            </tr>
            @endforelse
            </ul>

            <div class="px-4 py-4 sm:px-6">
                    {!! $hires->render() !!}
            </div>

        </div>
        {{-- end table --}}
        {{-- END CARD 2 --}}

    </div>
    </section>
</main>

@endsection
