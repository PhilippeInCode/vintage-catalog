@extends('layouts.internal')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Editar prenda</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.garments.update', $garment->id) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium">*Nombre</label>
                <input type="text" name="name" value="{{ old('name', $garment->name) }}" class="w-full mt-1 p-2 rounded border" required>
            </div>

            <div>
                <label class="block text-sm font-medium">*Tipo de uso</label>
                <select name="usage_type" class="w-full mt-1 p-2 rounded border" required>
                    <option value="">Selecciona...</option>
                    <option value="military" {{ $garment->usage_type == 'military' ? 'selected' : '' }}>Militar</option>
                    <option value="formal" {{ $garment->usage_type == 'formal' ? 'selected' : '' }}>Formal</option>
                    <option value="work" {{ $garment->usage_type == 'work' ? 'selected' : '' }}>Trabajo</option>
                    <option value="sport" {{ $garment->usage_type == 'sport' ? 'selected' : '' }}>Deporte</option>
                </select>
            </div>

            <div class="col-span-2">
                <label class="block text-sm font-medium">Descripción</label>
                <textarea name="description" class="w-full mt-1 p-2 rounded border" rows="4">{{ old('description', $garment->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium">País de origen</label>
                <input type="text" name="origin_country" value="{{ old('origin_country', $garment->origin_country) }}" class="w-full mt-1 p-2 rounded border">
            </div>

            <div>
                <label class="block text-sm font-medium">País de uso</label>
                <input type="text" name="used_country" value="{{ old('used_country', $garment->used_country) }}" class="w-full mt-1 p-2 rounded border">
            </div>

            <div>
                <label class="block text-sm font-medium">Año de producción</label>
                <input type="number" name="production_year" value="{{ old('production_year', $garment->production_year) }}" class="w-full mt-1 p-2 rounded border">
            </div>

            <div>
                <label class="block text-sm font-medium">Año de uso</label>
                <input type="number" name="usage_year" value="{{ old('usage_year', $garment->usage_year) }}" class="w-full mt-1 p-2 rounded border">
            </div>

            <div>
                <label class="block text-sm font-medium">Período de producción</label>
                <input type="text" name="production_period" value="{{ old('production_period', $garment->production_period) }}" class="w-full mt-1 p-2 rounded border">
            </div>

            <div>
                <label class="block text-sm font-medium">Materiales</label>
                <input type="text" name="materials" value="{{ old('materials', $garment->materials) }}" class="w-full mt-1 p-2 rounded border">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-brown text-white px-4 py-2 rounded hover:bg-opacity-90">Guardar cambios</button>
        </div>
    </form>
@endsection
