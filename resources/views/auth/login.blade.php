<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <!-- Session Status -->

    <h3 class="login-box-msg">
            {{ __('Usuario Login') }}
    </h3>

    <x-auth-session-status :status="session('status')" />
=======
<x-guest-layout>
    <!-- Session Status -->

    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Usuario Login') }}
    </h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />
>>>>>>> 6502411f574ce143f3c13b69ac4e753493e4531a

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
<<<<<<< HEAD
        <div class="input-group mb-3">
            <x-text-input id="email" class="form-control" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')"/>
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
                <option value="" disabled selected>{{ __('Seleccione un usuario') }}</option>
=======
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Tipo de usuario')" />
            <select id="role" name="role" class="block mt-1 w-full" required>
                <option value="" disabled selected>{{ __('Seleccione un rol') }}</option>
>>>>>>> 6502411f574ce143f3c13b69ac4e753493e4531a
                <option value="representante">{{ __('Representante') }}</option>
                <option value="admin">{{ __('Admin') }}</option>
                <option value="profesor">{{ __('Profesor') }}</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
<<<<<<< HEAD
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa solid fa-user"></span>
            </div>
          </div>
        </div>

        <!-- Renember me -->
        <div class="row">
            <div class="col-8">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Recordar usuario') }}</span>
                </label>
            </div>
          <!-- /.col -->
            <div class="col-4">
                <x-primary-button class="btn btn-primary btn-block">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
        
        <!--<div class="flex items-center justify-end mt-4">
=======
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
>>>>>>> 6502411f574ce143f3c13b69ac4e753493e4531a
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
<<<<<<< HEAD
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

    
=======
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
>>>>>>> 6502411f574ce143f3c13b69ac4e753493e4531a
