@extends('layouts.auth_app')
@section('title')
    Admin Login
@endsection
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card text-dark bg-light border-dark mt-4">
            <div class="card-header border-dark">
                <center><h5>Sistema de Tramite Documentario</h5></center>

            </div>
            <div class="card-body ">
                <center>Ingreso al sistema:</center>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger p-0">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email">
                            <span class="fa fa-user form-control-feedback" ></span>
                            Email: </label>
                        <input aria-describedby="emailHelpBlock" id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               placeholder="Ingrese su correo" tabindex="1"
                               value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
                               required>
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">
                                <i class="fa fa-key"></i>
                                Contraseña:</label>
                            {{-- <div class="float-right">
                                <a href="{{ route('password.request') }}" class="text-small">
                                    Olvidaste tu contraseña?
                                </a>
                            </div> --}}
                        </div>
                        <input aria-describedby="passwordHelpBlock" id="password" type="password"
                               value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                               placeholder="Ingrese su contraseña"
                               class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                               tabindex="2" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                   id="remember"{{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">Remember Me</label>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Ingresar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
