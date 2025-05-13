@extends('layouts.auth')

@section('content')
    <div class="bg-beige shadow-lg rounded-lg overflow-hidden">
        <div class="bg-beige px-6 py-8">
            <div class="flex flex-col items-center">
                <img src="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" class="h-12 mb-2" alt="Vintage Catalog logo">
                <h1 class="text-2xl font-bold text-brown mb-5">Registro</h1>
                <p class="text-sm text-gray-700 mt-1">Puedes crear tu cuenta aquí</p>
            </div>
        </div>

        <div class="px-6 py-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />
                    <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                    <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="text-sm text-brown hover:underline" href="{{ route('login') }}">
                        {{ __('¿Ya tienes cuenta?') }}
                    </a>
                </div>

                <div class="mt-6">
                    <x-primary-button class="w-full justify-center">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
