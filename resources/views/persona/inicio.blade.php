@extends('layouts.app')
@section('content')
<div class="container">
    @if ($user)
        <h1 class="mt-5 text-center">Hola, {{ $user->user_name }}!</h1>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="alert alert-info text-center">
                    ¡Bienvenido a nuestra aplicación!
                </div>
            </div>
        </div>
    </div>

    <!-- Otro mensaje más abajo -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="alert alert-success text-center">
                Tipo de Usuario: {{ $user->user_tipo == '0' ? 'Admin' : 'Invitado' }}
            </div>
            @else
              <p>No has iniciado sesion</p>
        </div>
    </div>
    @endif
    </div>
    @endsection
