<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>StudyChard | Registrar usuario</title>
  <link rel="icon" href="{{ asset('/AdminLTE/dist/img/logo.png') }}" type="image/png">
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
    <!-- dataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background-image: url('{{ asset('AdminLTE/dist/img/fondo_de_pantalla_login2.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh;">
<div class="wrapper"style="margin-top: 15px;">

  <!-- Preloader -->
  <!--<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>-->

  <!-- Navbar -->
  
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <section class="content" style="opacity: .9">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Registrar Usuario</h3>
                        @if($errors->any())
                        <div class="text-danger" style="text-align: center;">
                            ¡Error! Datos incorrectos
                        </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <!-- Rol -->
                            <div class="input-group card-body mb-3">
                                <select id="role" name="role" class="form-control" required onchange="toggleFields()">
                                    <option value="" disabled selected>{{ __('Seleccione un usuario') }}</option>
                                    <option value="representante">{{ __('Representante') }}</option>
                                    <option value="admin">{{ __('Admin') }}</option>
                                    <option value="profesor">{{ __('Profesor') }}</option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa solid fa-user"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Nombre -->
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name='nombre' class="form-control" value="{{ old('nombre') }}" placeholder="Ingrese el nombre" required autocomplete="given-name">
                            </div>

                            <!-- Apellido -->
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" id="apellido" name='apellido' class="form-control" value="{{ old('apellido') }}" placeholder="Ingrese el apellido" required autocomplete="family-name">
                            </div>

                            <!-- Edad -->
                            <div class="form-group" id="edadField" style="display: none;">
                                <label for="edad">Edad:</label>
                                <input type="number" id="edad" name="edad" class="form-control" min="18" value="{{ old('edad') }}" placeholder="Ingrese la edad" required autocomplete="age">
                            </div>

                             <!-- Tipo de Profesor -->
                        <div class="form-group" id="tipoProfesorField" style="display: none;">
                            <label for="tipo_profesor">Tipo de Profesor</label>
                            <select id="tipo_profesor" name="tipo_profesor" class="form-control" required>
                                <option value="" disabled selected>{{ __('Seleccione un tipo de profesor') }}</option>
                                <option value="regular">{{ __('Profesor Regular') }}</option>
                                <option value="deportes">{{ __('Profesor de Deportes') }}</option>
                            </select>
                        </div>

                            <!-- Grado Asignado -->
                            <div class="form-group" id="gradoField" style="display: none;">
                                <label for="grado_asignado">Grado Asignado</label>
                                <select id="grado_asignado" name="grado_asignado" class="form-control" required>
                                    <option value="" disabled selected>{{ __('Seleccione un Grado') }}</option>
                                    <option value="1er">{{ __('1er Grado') }}</option>
                                    <option value="2do">{{ __('2do Grado') }}</option>
                                    <option value="3er">{{ __('3er Grado') }}</option>
                                    <option value="4to">{{ __('4to Grado') }}</option>
                                    <option value="5to">{{ __('5to Grado') }}</option>
                                    <option value="6to">{{ __('6to Grado') }}</option>
                                    <option value="Todos los grados">{{ __('Todos los grados') }}</option>
                                </select>
                            </div>
                            <!-- Fecha de Nacimiento -->
                            <div class="form-group" id="fechaNacimientoField" style="display: none;">
                                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required autocomplete="bday">
                            </div>

                            <!-- Cédula -->
                            <div class="form-group" id="cedulaField" style="display: none;">
                                <label for="cedula">Cédula:</label>
                                <input type="text" id="cedula" name="cedula" class="form-control" value="{{ old('cedula') }}" placeholder="ejemplo: 12.345.678" required autocomplete="off">
                            </div>
                            <!-- Dirección -->
                            <div class="form-group" id="direccionField" style="display: none;">
                                <label for="direccion">Dirección:</label>
                                <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion') }}" placeholder="Ingrese la dirección" required autocomplete="address-line1">
                            </div>

                            <!-- Teléfono del Representante -->
                        <div class="form-group" id="telefonoRepresentanteField" style="display: none;">
                            <label for="telefono_representante">Teléfono del Representante (Venezuela):</label>
                            <div class="input-group">
                                <span class="input-group-text">+58</span>
                                <input type="tel" id="telefono_representante" name="telefono_representante" class="form-control" value="{{ old('telefono_representante') }}" placeholder="Ingrese el teléfono" pattern="[0-9]{10}" title="Debe ingresar un número de 10 dígitos sin el código de país" maxlength="10">
                            </div>
                            <small class="form-text text-muted">Ejemplo: 1234567890</small>
                        </div>


                            <!-- Teléfono del Profesor -->
                            <div class="form-group" id="telefonoProfesorField" style="display: none;">
                                <label for="telefono_profesor">Teléfono del Profesor (Venezuela):</label>
                                <div class="input-group">
                                    <span class="input-group-text">+58</span>
                                    <input type="tel" id="telefono_profesor" name="telefono_profesor" class="form-control" value="{{ old('telefono_profesor') }}" placeholder="Ingrese el teléfono" pattern="[0-9]{10}" title="Debe ingresar un número de 10 dígitos sin el código de país" maxlength="10">
                                </div>
                                <small class="form-text text-muted">Ejemplo: 1234567890</small>
                            </div>

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Ingrese el email" required autocomplete="email">
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese la contraseña" required autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirme la contraseña" required autocomplete="new-password">
                            </div>

                            <!-- Mensaje de verificación de contraseña -->
                            <div id="passwordMessage" class="text-danger" style="display: none;"></div>


                            <!-- Foto -->
                            <div class="form-group">
                                <label for="foto">Foto del Usuario:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*" required>
                                    <label class="custom-file-label" for="foto">Seleccionar archivo</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit" tabindex="5">Registrar</button>
                            <button class="btn btn-secondary" type="reset" tabindex="4">Limpiar</button>

                            <a href="{{ route('admin.dashboard') }}" class="btn {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                {{ __('Inicio') }}
                            </a>
                        </div>
                    </form>
                </div>
                <!-- ./card -->
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->

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

    function toggleFields() {
        const role = document.getElementById('role').value;
        const edadField = document.getElementById('edadField');
        const gradoField = document.getElementById('gradoField');
        const fechaNacimientoField = document.getElementById('fechaNacimientoField');
        const cedulaField = document.getElementById('cedulaField');
        const direccionField = document.getElementById('direccionField');
        const telefonoRepresentanteField = document.getElementById('telefonoRepresentanteField');
        const telefonoProfesorField = document.getElementById('telefonoProfesorField');
        const tipoProfesorField = document.getElementById('tipoProfesorField');

        // Ocultar todos los campos específicos
        edadField.style.display = 'none';
        gradoField.style.display = 'none';
        fechaNacimientoField.style.display = 'none';
        cedulaField.style.display = 'none';
        direccionField.style.display = 'none';
        telefonoRepresentanteField.style.display = 'none';
        telefonoProfesorField.style.display = 'none';
        tipoProfesorField.style.display = 'none';

        // Mostrar campos según el rol seleccionado
        if (role === 'admin') {
            // Solo se envían nombre, apellido, email, password y foto
            // No se muestran campos adicionales
            document.getElementById('edad').required = false;
        document.getElementById('fecha_nacimiento').required = false;
        document.getElementById('cedula').required = false;
        document.getElementById('direccion').required = false;
        document.getElementById('telefono_representante').required = false;
        document.getElementById('telefono_profesor').required = false;
        document.getElementById('tipo_profesor').required = false;
        document.getElementById('grado_asignado').required = false;
        } else if (role === 'representante') {
            edadField.style.display = 'block';
            fechaNacimientoField.style.display = 'block';
            cedulaField.style.display = 'block';
            direccionField.style.display = 'block';
            telefonoRepresentanteField.style.display = 'block';
            document.getElementById('telefono_representante').required = true; // Hacer requerido
            document.getElementById('telefono_profesor').required = false; // Hacer requerido
            document.getElementById('tipo_profesor').required = false;
            document.getElementById('grado_asignado').required = false;
        } else if (role === 'profesor') {
            edadField.style.display = 'block';
            gradoField.style.display = 'block';
            tipoProfesorField.style.display = 'block';
            fechaNacimientoField.style.display = 'block';
            cedulaField.style.display = 'block';
            direccionField.style.display = 'block';
            telefonoProfesorField.style.display = 'block';
            document.getElementById('telefono_representante').required = false; // Hacer requerido
            document.getElementById('telefono_profesor').required = true; // Hacer requerido
            document.getElementById('edad').required = true;
        document.getElementById('fecha_nacimiento').required = true;
        document.getElementById('cedula').required = true;
        document.getElementById('direccion').required = true;
        document.getElementById('tipo_profesor').required = true;
        document.getElementById('grado_asignado').required = true;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const passwordMessage = document.getElementById('passwordMessage');

    confirmPasswordInput.addEventListener('input', function() {
        if (confirmPasswordInput.value !== passwordInput.value) {
            passwordMessage.style.display = 'block';
            passwordMessage.textContent = 'Las contraseñas no coinciden.';
        } else {
            passwordMessage.style.display = 'none';
        }
    });
});
</script>
</body>
</html>