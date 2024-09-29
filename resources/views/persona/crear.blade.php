@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Mensajes de éxito o error -->
    @if (session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mt-3" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <h1>Crear Persona</h1>

    <!-- Formulario para crear persona -->
    <form method="POST" action="{{ route('persona.bank') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="ocupacion">Ocupación:</label>
            <input type="text" id="ocupacion" name="ocupacion" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
