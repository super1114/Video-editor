@extends('layouts.app')

@section('content')
<main class="-mt-28 pb-8">
    <section aria-labelledby="hire-contract">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <x-slot name="title">
                <a href="{{ route('hires.index') }}" class="mr-4"
                    ><i class="mr-1 icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.hires.edit_title')
            </x-slot>

            <x-form
                method="PUT"
                action="{{ route('hires.update', $hire) }}"
                class="mt-4"
            >
                @include('app.hires.form-inputs')                
                <div class="mt-10">
                    <a href="{{ route('hires.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a href="{{ route('hires.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add text-primary"></i>
                        @lang('crud.common.create')
                    </a>                                         
                    @if($hire->status == 'pending')
                    
                    <a href="{{route('email', ['hire_id' => $hire])}}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-4 rounded-md float-right ml-5">
                    <span class="mr-2">Sign Request To Client</span>
                        <i class="icon ion-md-return-right text-primary"></i>
                    </a>
                    @endif                                        
                    
                    @if($hire->status == 'onHire' || $hire->status == 'offHire')                        
                        @if($hire->tanker->type == 'Non-Rigid')
                            @if(count($hire->checkListsNRs) == 1)   
                            <a href="{{route('check-list-n-rs.create', ['hire_id' => $hire, 'check_list_type' => 'Off' ])}}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-4 rounded-md float-right ml-5">
                            @endif
                            @if(count($hire->checkListsNRs) == 2)
                            <a href="{{route('check-list-n-rs.edit', ['check_list_n_r' => $hire->checkListsNRs[1]])}}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-4 rounded-md float-right ml-5">
                            @endif
                        @endif
                        @if($hire->tanker->type == 'Rigid')
                            @if(count($hire->checkListRigids) == 1)   
                            <a href="{{route('check-list-rigids.create', ['hire_id' => $hire, 'check_list_type' => 'Off' ])}}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-4 rounded-md float-right ml-5">
                            @endif
                            @if(count($hire->checkListRigids) == 2)
                            <a href="{{route('check-list-rigids.edit', ['check_list_rigid' => $hire->checkListRigids[1]])}}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-4 rounded-md float-right ml-5">
                            @endif
                        @endif   
                            <span class="mr-2">Off-Hire CheckList</span>
                            <i class="icon ion-md-return-right text-primary"></i>
                        </a>     
                    @endif           
                    @if($hire->status != 'pending' && $hire->status != 'draft')
                        @if($hire->tanker->type == 'Non-Rigid')
                            @if(count($hire->checkListsNRs) == 0)   
                            <a href="{{route('check-list-n-rs.create', ['hire_id' => $hire, 'check_list_type' => 'On' ])}}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-4 rounded-md float-right ml-5">
                            @endif
                            @if(count($hire->checkListsNRs) != 0)
                            <a href="{{route('check-list-n-rs.edit', ['check_list_n_r' => $hire->checkListsNRs[0]])}}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-4 rounded-md float-right ml-5">
                            @endif
                        @endif
                        @if($hire->tanker->type == 'Rigid')
                            @if(count($hire->checkListRigids) == 0)   
                            <a href="{{route('check-list-rigids.create', ['hire_id' => $hire, 'check_list_type' => 'On' ])}}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-4 rounded-md float-right ml-5">
                            @endif
                            @if(count($hire->checkListRigids) != 0)
                            <a href="{{route('check-list-rigids.edit', ['check_list_rigid' => $hire->checkListRigids[0]])}}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-4 rounded-md float-right ml-5">
                            @endif
                        @endif
                            <span class="mr-2">On-Hire CheckList</span>
                            <i class="icon ion-md-return-right text-primary"></i>
                        </a>
                    @endif            
                    
                    <button type="submit" class="button button-primary float-right border-none">
                        <i class="mr-1 icon ion-md-save"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
        </div>
    </section>
</main>
@endsection
