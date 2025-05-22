@extends('layouts.internal')

@section('content')
    <h1>Eliminar prendas</h1>
    @foreach ($garments as $garment)
        <p>{{ $garment->name }}</p>
    @endforeach
@endsection
