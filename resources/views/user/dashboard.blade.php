@extends('layouts.internal')

@section('content')
        <h1 class="text-xl mb-4">Bienvenido, {{ Auth::user()->name }}. Este es tu panel de usuario.</h1>
@endsection
