@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Buscar una persona para eliminar</h5>

                    <!-- Formulario para buscar persona por nombre o ID -->
                    <form method="get" action="{{ route('persona.search') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="search">Buscar por Nombre o ID:</label>
                            <input type="text" id="search" name="search" class="form-control" placeholder="Ingresa el nombre o ID">
                        </div>

                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>

                    <!-- Mostrar datos si la persona fue encontrada -->
                    @if(isset($persona))
                        <div class="mt-4">
                            <h5>Datos de la persona encontrada:</h5>
                            <ul>
                                <li><strong>Nombre:</strong> {{ $persona->nombre }}</li>
                                <li><strong>Edad:</strong> {{ $persona->edad }}</li>
                                <li><strong>Ocupación:</strong> {{ $persona->ocupacion }}</li>
                            </ul>

                            <!-- Formulario para eliminar la persona -->
                            <form method="POST" action="{{ route('persona.destroy', $persona->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    @endif

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
