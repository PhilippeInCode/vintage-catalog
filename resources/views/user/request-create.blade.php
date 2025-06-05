@extends('layouts.internal')

@section('content')
    <h1 class="text-4xl font-serif font-bold text-center mb-10">Solicitud añadir prenda</h1>

    <form action="{{ route('request.garment.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-6xl mx-auto">
        @csrf

        <div>
            <label class="block mb-1 font-semibold">*Nombre:</label>
            <input type="text" name="name" maxlength="150" required class="w-full rounded-full px-4 py-2 border border-gray-300">
        </div>

        <div>
            <label class="block mb-1 font-semibold">*Tipo de uso:</label>
            <select name="usage_type" required class="w-full rounded-full px-4 py-2 border border-gray-300">
                <option value="">Selecciona uno</option>
                <option value="military">Militar</option>
                <option value="formal">Formal</option>
                <option value="trabajo">Trabajo</option>
                <option value="deporte">Deporte</option>
            </select>
        </div>

        <div class="md:col-span-2">
            <label class="block mb-1 font-semibold">Descripción:</label>
            <textarea name="description" maxlength="500" rows="4" class="w-full rounded-xl px-4 py-2 border border-gray-300"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-semibold">País de origen:</label>
            <input type="text" name="origin_country" class="w-full rounded-full px-4 py-2 border border-gray-300">
        </div>

        <div>
            <label class="block mb-1 font-semibold">País de uso:</label>
            <input type="text" name="used_country" class="w-full rounded-full px-4 py-2 border border-gray-300">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Año de producción:</label>
            <input type="number" name="production_year" min="1900" max="2100" class="w-full rounded-full px-4 py-2 border border-gray-300">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Año de uso:</label>
            <input type="number" name="usage_year" min="1900" max="2100" class="w-full rounded-full px-4 py-2 border border-gray-300">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Período de producción:</label>
            <input type="text" name="production_period" placeholder="Ej: 1940s" class="w-full rounded-full px-4 py-2 border border-gray-300">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Materiales:</label>
            <input type="text" name="materials" placeholder="algodón, lino..." class="w-full rounded-full px-4 py-2 border border-gray-300">
        </div>

        <div class="md:col-span-2">
            <label class="block mb-2 font-semibold">Fotografías:</label>
            <input type="file" name="photos[]" multiple accept="image/*" class="block w-full border rounded px-4 py-2">
        </div>

        <div class="md:col-span-2 text-center mt-6">
            <button type="submit" class="bg-brown text-white px-6 py-2 rounded-full hover:bg-opacity-90">
                Enviar solicitud
            </button>
        </div>
    </form>
@endsection
