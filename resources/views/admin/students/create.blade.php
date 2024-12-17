<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.css') }}">
</head>

<x-admin-app-layout>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!--<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>-->

  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.layouts.side-nav')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Panel - Administrador {{ Auth::user()->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('dashboard')">
                      {{ __('Inicio') }}
                    </x-nav-link></li>
              <li class="breadcrumb-item active">Panel - Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row row justify-content-center">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Registrar Estudiante</h3>
                    @if($errors->any())
                    <div class="text-danger" style="text-align: center;">
                        ¡Eror! Datos incorrectos
                    </div>
                    @endif
            </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.student.view') }}" enctype="multipart/form-data">
                @csrf

                <!-- Nombre -->
                <div class="card-body">
                  <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" name='nombre' class="form-control" value="{{old('nombre')}}" placeholder="Ingrese el nombre" required>
                  </div>
                
                  <!-- Apellido -->
                  <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" name='apellido' class="form-control" value="{{old('apellido')}}" placeholder="Ingrese el apellido" required>
                  </div>

                <!-- Edad -->
                <div class="form-group">
                    <label for="edad">Edad:</label>
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <input type="number" name="edad" class="form-control" min="5" max="12" value="{{ old('edad') }}" placeholder="Ingrese la edad" required>
                        </div>
                        <div class="col-sm-auto">
                            <p class="mb-0">{{ __('Años') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Grado -->
                <div class="form-group">
                        <label>Grado</label>
                        <select id="grado" name="grado" class="form-control" required>
                            <option value="" disabled selected>{{ __('Seleccione un Grado') }}</option>
                            <option value="1er">{{ __('1er Grado') }}</option>
                            <option value="2do">{{ __('2do Grado') }}</option>
                            <option value="3er">{{ __('3er Grado') }}</option>
                            <option value="4to">{{ __('4to Grado') }}</option>
                            <option value="5to">{{ __('5to Grado') }}</option>
                            <option value="6to">{{ __('6to Grado') }}</option>
                        </select>
                    </div> 
                     <!-- Foto estudiante -->
                     <div class="form-group">
                        <label for="foto">Foto del Estudiante:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*" required>
                            <label class="custom-file-label" for="foto">Seleccionar archivo</label>
                        </div>
                    </div>
                    <!-- Fecha de nacimiento -->
                    <div class="form-group">
                        <label>Fecha de Nacimiento:</label>
                        <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
                    </div>

                    <div class="form-group" id="cedula-group" style="display: none;">
                        <label for="cedula">Cédula del Estudiante:</label>
                        <input type="txt" name="cedula" class="form-control" value="{{ old('cedula') }}" placeholder="ejemplo: 12.345.678" required>
                        <small class="form-text text-muted">Este campo es requerido si el estudiante tiene 9 años o más.</small>
                    </div>
                    
                  <!-- Direccion -->
                    <div class="form-group">
                        <label>Dirección:</label>
                        <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}" placeholder="Ingrese la dirección" required>
                    </div>
                    
                    <!-- Telefono del representante -->
                    <div class="form-group">
                      <label for="telefono_representante">Teléfono del Representante (Venezuela):</label>
                      <div class="input-group">
                          <span class="input-group-text">+58</span>
                          <input type="tel" name="telefono_representante" class="form-control" value="{{ old('telefono_representante') }}" placeholder="Ingrese el teléfono" required pattern="[0-9]{10}" title="Debe ingresar un número de 10 dígitos sin el código de país" maxlength="10">
                      </div>
                      <small class="form-text text-muted">Ejemplo: 1234567890</small>
                  </div>

                 
                <!-- /.card-body -->
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" tabindex="5">Registrar</button>
                    <button class="btn btn-secondary" type="reset" tabindex="4">Limpiar</button>
                </div>
            </div>
        </form>
    </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024-2025 Sitema escolar.</strong>
    Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('AdminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.js') }}"></script>
<script>
    document.querySelector('.custom-file-input').addEventListener('change', function (e) {
        var fileName = e.target.files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });

    document.addEventListener('DOMContentLoaded', function() {
        const edadInput = document.querySelector('input[name="edad"]');
        const cedulaGroup = document.getElementById('cedula-group');

        edadInput.addEventListener('input', function() {
            const edad = parseInt(edadInput.value);
            if (edad >= 9) {
                cedulaGroup.style.display = 'block';
                cedulaGroup.querySelector('input[name="cedula"]').setAttribute('required', 'required');
            } else {
                cedulaGroup.style.display = 'none';
                cedulaGroup.querySelector('input[name="cedula"]').removeAttribute('required'); 
            }
        });
    });
</script>
</body>
</x-admin-app-layout>
</html>

    

    
