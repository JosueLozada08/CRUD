@extends('layouts.app2')

@section('content')
    <div class="container vh-100"> <!-- Mantiene toda la altura de la ventana -->
        <div class="row justify-content-center align-items-center h-100"> <!-- Alinear verticalmente -->
            <div class="col-md-5"> <!-- Aumenta el tamaño del contenedor -->
                <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;"> <!-- Bordes redondeados y ocultar overflow -->
                    <div class="card-header text-center" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                        <h4>Iniciar Sesión</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-center">Por favor ingresa tus credenciales</p>
                        
                        <!-- Formulario de login -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="user_name">Nombre de Usuario</label>
                                <input type="text" id="user_name" name="user_name" class="form-control" value="{{ old('user_name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="user_pass">Contraseña</label>
                                <input type="password" id="user_pass" name="user_pass" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </form>

                        <!-- Muestra de errores -->
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
