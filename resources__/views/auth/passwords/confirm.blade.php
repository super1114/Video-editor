@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 md:px-8">
    <x-partials.card>
        <x-slot name="title">{{ __('Confirm Password') }}</x-slot>

        <div class="flex-auto p-6">
            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-4 flex flex-wrap">
                    <label for="password" class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 leading-normal md:text-right">{{ __('Password') }}</label>

                    <div class="md:w-1/2 pr-4 pl-4">
                        <x-inputs.password name="password" required autocomplete="current-password"/>

                        @error('password')
                            <span class="hidden mt-1 text-sm text-red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 flex flex-wrap">
                    <div class="md:w-2/3 pr-4 pl-4 md:mx-1/3">
                        <button type="submit" class="button button-primary">
                            {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="button" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </x-partials.card>
</div>
@endsection
