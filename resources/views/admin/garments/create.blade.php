@extends('layouts.internal')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Añadir nueva prenda</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.garments.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-6">

            <div>
                <label class="block text-sm font-medium">*Nombre</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full mt-1 p-2 rounded border" required>
            </div>

            <div>
                <label class="block text-sm font-medium">*Tipo de uso</label>
                <select name="usage_type" class="w-full mt-1 p-2 rounded border" required>
                    <option value="">Selecciona...</option>
                    <option value="military">Militar</option>
                    <option value="formal">Formal</option>
                    <option value="work">Trabajo</option>
                    <option value="sport">Deporte</option>
                </select>
            </div>

            <div class="col-span-2">
                <label class="block text-sm font-medium">Descripción</label>
                <textarea name="description" class="w-full mt-1 p-2 rounded border" rows="4">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium">País de origen</label>
                <input type="text" name="origin_country" value="{{ old('origin_country') }}" class="w-full mt-1 p-2 rounded border">
            </div>

            <div>
                <label class="block text-sm font-medium">País de uso</label>
                <input type="text" name="used_country" value="{{ old('used_country') }}" class="w-full mt-1 p-2 rounded border">
            </div>

            <div>
                <label class="block text-sm font-medium">Año de producción</label>
                <input type="number" name="production_year" value="{{ old('production_year') }}" class="w-full mt-1 p-2 rounded border">
            </div>

            <div>
                <label class="block text-sm font-medium">Año de uso</label>
                <input type="number" name="usage_year" value="{{ old('usage_year') }}" class="w-full mt-1 p-2 rounded border">
            </div>

            <div>
                <label class="block text-sm font-medium">Período de producción</label>
                <input type="text" name="production_period" value="{{ old('production_period') }}" class="w-full mt-1 p-2 rounded border">
            </div>

            <div>
                <label class="block text-sm font-medium">Materiales</label>
                <input type="text" name="materials" value="{{ old('materials') }}" class="w-full mt-1 p-2 rounded border">
            </div>

            <div class="col-span-2">
                <label class="block text-lg font-serif font-semibold mb-2">Fotografías:</label>
                <input type="file" name="photos[]" accept="image/*" multiple required class="block w-full text-sm text-brown">
                <p class="text-sm mt-1 text-gray-600">Mín 1 imagen - máx 10 imágenes</p>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-brown text-white px-4 py-2 rounded hover:bg-opacity-90">Añadir prenda</button>
        </div>
    </form>
@endsection
