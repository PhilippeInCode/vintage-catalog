@extends('layouts.auth')

@section('content')
    <div class="bg-beige shadow-lg rounded-lg overflow-hidden">
        <div class="bg-beige px-6 py-8">
            <div class="flex flex-col items-center">
                <img src="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" class="h-12 mb-2" alt="Vintage Catalog logo">
                <h1 class="text-2xl font-bold text-brown mb-5">Login</h1>
                <p class="text-sm text-gray-700 mt-1 text-center">¡Bienvenido de nuevo! <br>Por favor, logeate para acceder a tu cuenta.</br></p>
            </div>
        </div>

        <div class="px-6 py-6">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />
                    <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-brown hover:underline" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste la contraseña?') }}
                        </a>
                    @endif
                </div>

                <div class="mt-6">
                    <x-primary-button class="w-full justify-center">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
