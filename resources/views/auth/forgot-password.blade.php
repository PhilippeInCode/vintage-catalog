@extends('layouts.auth')

@section('content')
    <div class="bg-beige shadow-lg rounded-lg overflow-hidden">
        <div class="bg-beige px-6 py-8">
            <div class="flex flex-col items-center">
                <img src="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" class="h-12 mb-2" alt="Vintage Catalog logo">
                <h1 class="text-2xl font-bold text-brown">Vintage Catalog</h1>
                <p class="text-sm text-gray-700 mt-1">¿Contraseña olvidada?</p>
            </div>
        </div>

        <div class="px-6 py-6">
            <p class="mb-3 text-sm text-gray-600">
                ¿Has olvidado tu contraseña?
            </p>

            <p class="mb-4 text-sm text-gray-600">
                No te preocupes, tan solo escribe tu dirección de correo electrónico y te enviaremos un enlace para restablecerla.
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-primary-button class="w-full justify-center">
                        {{ __('Enviar enlace') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
