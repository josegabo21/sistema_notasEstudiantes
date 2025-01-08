
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
  <!-- dataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>

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
            <h1 class="m-0">Lista de estudiantes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('dashboard')">
                      {{ __('Inicio') }}
                    </x-nav-link></li>
              <li class="breadcrumb-item active">Lista de Profesores</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row justify-content-center">
        <!-- Small boxes (Stat box) -->
        <div class="col-md-25">
            <div class="table-responsive mt-4">
                <div class="bg-white p-4 rounded">
                <div style="overflow-x: auto;">
                            <table id="studentsTable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Nombre</th>
                                        <th scope="col" class="text-center">Apellido</th>
                                        <th scope="col" class="text-center">Correo</th>
                                        <th scope="col" class="text-center">Cedula</th>
                                        <th scope="col" class="text-center">Edad</th>
                                        <th scope="col" class="text-center">Fecha de Nacimiento</th>
                                        <th scope="col" class="text-center">Grado Asignado</th>
                                        <th scope="col" class="text-center">Direccion</th>
                                        <th scope="col" class="text-center">Telefono</th>
                                        <th scope="col" class="text-center">Opciones</th>

                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach ($profesores as $profesor)
                                    <tr>
                                        <td class="text-center">{{$profesor->nombre}}</td>
                                        <td class="text-center">{{$profesor->apellido}}</td> 
                                        <td class="text-center">{{$profesor->email}}</td>
                                        <td class="text-center">{{$profesor->cedula}}</td>
                                        <td class="text-center">{{$profesor->edad}} {{ __('Años') }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($profesor->fecha_nacimiento)->format('d/m/Y') }}</td>  
                                        <td class="text-center">{{$profesor->grado_asignado }} {{ __('Grado') }}</td>
                                        <td class="text-center">{{$profesor->direccion}}</td>
                                        <td class="text-center"><span class="mr-2">+58</span>{{$profesor->telefono_profesor}}</td>  
                                        <td class="text-center"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#assignGradeModal" data-id="{{ $profesor->id }}" data-nombre="{{ $profesor->nombre }}" data-apellido="{{ $profesor->apellido }}" data-grado="{{ $profesor->grado_asignado }}">
                                            Asignar Grado
                                        </button></td>                        
                                    </tr>
                                    @endforeach
                                </tbody>   
                            </table>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Modal -->
    <div class="modal fade" id="assignGradeModal" tabindex="-1" role="dialog" aria-labelledby="assignGradeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignGradeModalLabel">Asignar Grados a Profesores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.usuarios.asignar_grados') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="grado_asignado">Grado para <span id="profesorNombre"></span></label>
                        <select id="grado_asignado" name="grados[0][grado_asignado]" class="form-control" required>
                            <option value="" disabled selected>{{ __('Seleccione un Grado') }}</option>
                            <option value="1er">{{ __('1er Grado') }}</option>
                            <option value="2do">{{ __('2do Grado') }}</option>
                            <option value="3er">{{ __('3er Grado') }}</option>
                            <option value="4to">{{ __('4to Grado') }}</option>
                            <option value="5to">{{ __('5to Grado') }}</option>
                            <option value="6to">{{ __('6to Grado') }}</option>
                        </select>
                        <input type="hidden" name="grados[0][id]" id="profesorId" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Asignar Grados</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')

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
<!-- dataTables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<!--SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
 $(document).ready(function() {
    $('#studentsTable').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": {
            "lengthMenu": "Mostrar _MENU_ entradas por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
            "infoFiltered": "(filtrado de _MAX_ entradas totales)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});
</script>

<script>
    function confirmDelete(studentId) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + studentId).submit();
        }
    });
}
</script>

<script>

    $(document).ready(function() {
    $('#assignGradeModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var id = button.data('id'); // Extrae la información de los atributos data-*
        var nombre = button.data('nombre');
        var apellido = button.data('apellido');
        var grado = button.data('grado');

        // Actualiza el contenido del modal
        var modal = $(this);
        modal.find('#profesorNombre').text(nombre + ' ' + apellido);
        modal.find('#profesorId').val(id);
        
    });
});
</script>
</body>
</html>


    

