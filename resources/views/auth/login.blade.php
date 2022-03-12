@extends('layouts.auth_app')
@section('title')
    Admin Login
@endsection
@section('content')
<main class="form-signin">
    <img src="https://iestphuancane.edu.pe/wp-content/uploads/2021/07/insignia2.png" alt="logo" width="100%" class="shadow-light">
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
      <h2 class="mb-3 mt-3 fw-normal" style="color: #f3f0f7">Login</h2>
      <div class="form-floating text-left" style="color: #f3f0f7">
        <label class="form-label">
            Usuario:
        </label>
          <input aria-describedby="emailHelpBlock" id="floatingInput" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               placeholder="Ingrese su usuario" name="email"
                               tabindex="1"
                               value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
                               required>
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
      </div>
      <div class="form-floating mt-3 text-left" style="color: #f3f0f7">
        <label class="form-label">
            Contraseña
        </label>
        <input aria-describedby="passwordHelpBlock" id="floatingPassword" type="password"
                               value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                               placeholder="Ingrese su contraseña"
                               class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                               tabindex="2" required>
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
      </div>
      <button class="w-100 btn btn-lg btn-success" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">© 2022</p>
    </form>
  </main>
@endsection
