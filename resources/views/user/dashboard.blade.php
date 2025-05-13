<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Panel de Usuario</h2>
    </x-slot>

    <div class="p-4">
        Bienvenido, {{ Auth::user()->name }}. Estás en tu panel de usuario.
    </div>
</x-app-layout>
