<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registrar usuario</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page" style="background-image: url('/AdminLTE/dist/img/fondo_de_pantalla_login2.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh;">
<div class="login-box">
  <div class="login-logo" style="margin-bottom: 0px;">
 
    <img src="/AdminLTE/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .9 width: 200px; height: 180px;">
  </div>
  <!-- /.login-logo -->
  <div class="card" style="opacity: .9">
    <div class="card-body login-card-body">

      <!-- Session Status -->

    <h3 class="login-box-msg">
            {{ __('Iniciar Sesión') }}
    </h3>

    <div>
    <p class="text-center">
            {{ __('¡Advertencia! solo los admin pueden registrar usuarios') }}
</p>
    <div>
    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <!-- Error usuario o contrasena -->
        <x-input-error :messages="$errors->get('email')" class="text-danger" style="text-align: center;"/>
        <!-- Email Address -->
        <div class="input-group mb-3">
            <x-text-input id="email" class="form-control" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        

        <!-- Password -->
        <div class="input-group mb-3">
            <x-text-input id="password" class="form-control" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- Role Selection -->
        <div class="input-group mb-3">
            <select id="role" name="role" class="form-control" class="block mt-1 w-full" required>
                <option value="admin">{{ __('Admin') }}</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa solid fa-user"></span>
            </div>
          </div>
        </div>
        
        <!-- Renember me -->

          <!-- /.col -->
            <div class="col-4">
                <x-primary-button class="btn btn-primary btn-block">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
        
        <!--<div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif-->
    </form>

      
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>