@extends('layouts.app')

@section('content')
<main class="-mt-24 pb-8">
    <section aria-labelledby="hire-contract">

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">

        {{-- START TOP CARD --}}
        <div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
            <h2 class="sr-only" id="profile-overview-title">@lang('crud.tankers.index_title')</h2>
            <div class="bg-white p-6">
              <div class="sm:flex sm:items-center sm:justify-between">
                <div class="sm:flex sm:space-x-5">
                  <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                    <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
                    <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{ $archive ? __('crud.tankers.archived_title') : __('crud.tankers.index_title')}}</p>
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

              {{-- START CONTENT IN TOP CARD --}}
              <div class="mt-4 mb-10 relative">                                                                                               
                    @can('create', App\Models\Tanker::class)
                    <a
                        href="{{ route('tankers.create') }}"
                        class="button button-primary float-right py-1 px-4 border-none"
                    >
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan   
                    @can('view-any', App\Models\Tanker::class)
                                                    
                    <a
                        href="{{ $archive ? route('tankers.index') : route('tankers.index', ['archive' => true]) }}"
                        class="bg-green-500 hover:bg-green-700 text-white py-1 px-4 rounded-md float-right mr-5"
                    >                                
                        <i class="icon ion-md-archive"></i>                    
                        <span class="mr-1">{{ !$archive ? __('crud.common.archived') : __('crud.common.back') }} </span>                                                                                                                 
                    </a>
                    @endcan                                                                         
            </div>

            <div class="block w-full mt-20">
                <div class="flex flex-col w-full">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="mb-4 bg-transparent divide-y divide-gray-200 w-full">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                @lang('crud.tankers.inputs.fleet_num')
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                @lang('crud.tankers.inputs.tank_type')
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                @lang('crud.tankers.inputs.equipment')
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                @lang('crud.tankers.inputs.make')
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                @lang('crud.tankers.inputs.sector')
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                TYPE
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                @lang('crud.tankers.inputs.mot_expiry')
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                @lang('crud.tankers.inputs.adr_expiry')
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($tankers as $tanker)
                                        <!-- Odd row -->
                                        <tr class="bg-white hover:bg-gray-50" id="{{ 'row'.$tanker->id }}">
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                                {{ $tanker->fleet_num ?? '-'}}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $tanker->tank_type ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $tanker->equipment ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $tanker->make ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $tanker->sector ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $tanker->type ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ date_format($tanker->mot_expiry,"Y/m/d")  ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ date_format($tanker->adr_expiry,"Y/m/d")  ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-right text-sm font-medium">
                                                <a href="{{route('tankers.edit', $tanker)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <a onclick="archive({{$tanker->id}})" class="text-indigo-600 hover:text-indigo-900 ml-5 cursor-pointer">{{ $archive ? 'Remove' : 'Archive' }}</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="13 px-5">
                                                @lang('crud.common.no_items_found')
                                            </td>
                                        </tr>
                                        @endforelse
                                    <!-- More items... -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="pt-10 px-10" colspan="13">
                                                {!! $tankers->render() !!}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              {{-- END CONTENT IN TOP CARD --}}
            </div>
        </div>
        {{-- END TOP CARD --}}

        {{-- START CARD 2 --}}

        {{-- END CARD 2 --}}

    </div>
    </section>
</main>

@endsection
<script>
    var base_url = "{{ url('/') }}";
</script>
<script src="{{ asset('js/tanker.js') }}"></script>