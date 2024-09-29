@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Añadir una persona</h5>

                    <form method="post" action="{{ route('persona.bank') }}">
                        @csrf
                        
                        <!-- Campo Nombre -->
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa el nombre">
                        </div>

                        <!-- Campo Edad -->
                        <div class="form-group mb-3">
                            <label for="edad">Edad:</label>
                            <input type="number" id="edad" name="edad" class="form-control" placeholder="Ingresa la edad">
                        </div>

                        <!-- Campo Ocupación -->
                        <div class="form-group mb-3">
                            <label for="ocupacion">Ocupación:</label>
                            <input type="text" id="ocupacion" name="ocupacion" class="form-control" placeholder="Ingresa la ocupación">
                        </div>

                        <!-- Botón de enviar -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>

                    <!-- Mensaje de éxito -->
                    @if (session('success'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
