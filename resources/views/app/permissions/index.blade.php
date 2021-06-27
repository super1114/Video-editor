@extends('layouts.app')

@section('content')

<main class="-mt-24 pb-8">
    <section aria-labelledby="hire-contract">

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">

        {{-- START TOP CARD --}}
        <div class="mb-10 rounded-lg bg-white overflow-hidden shadow">
            <h2 class="sr-only" id="profile-overview-title">@lang('crud.permissions.index_title')</h2>
            <div class="bg-white p-6">
              <div class="sm:flex sm:items-center sm:justify-between">
                <div class="sm:flex sm:space-x-5">
                  <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                    <p class="text-sm font-medium text-gray-600">TCL Tankers</p>
                    <p class="text-xl font-bold text-gray-900 sm:text-2xl">@lang('crud.permissions.index_title')</p>
                    <p class="text-sm font-medium text-gray-400">.</p>
                  </div>
                </div>
              </div>

              {{-- START CONTENT IN TOP CARD --}}
              <div class="mt-4 mb-5">
                <div class="flex flex-wrap">
                    <div class="md:w-full text-right">
                        @can('create', App\Models\Permission::class)
                        <a
                            href="{{ route('permissions.create') }}"
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
                                @lang('crud.permissions.inputs.name')
                            </th>
                            <th class="px-4 py-3 text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permissions as $permission)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-left">
                                {{ $permission->name ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="relative inline-flex align-middle"
                                >
                                    @can('update', $permission)
                                    <a
                                        href="{{ route('permissions.edit', $permission) }}"
                                        class="mr-1"
                                    >
                                        <button type="button" class="button">
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $permission)
                                    <a
                                        href="{{ route('permissions.show', $permission) }}"
                                        class="mr-1"
                                    >
                                        <button type="button" class="button">
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $permission)
                                    <form
                                        action="{{ route('permissions.destroy', $permission) }}"
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
                            <td colspan="2">@lang('crud.common.no_items_found')</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="pt-10" colspan="2">
                                {!! $permissions->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
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
