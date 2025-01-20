
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>StudyChard | Panel estudiantes</title>
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
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('dashboard')">
                      {{ __('Inicio') }}
                    </x-nav-link></li>
              <li class="breadcrumb-item active">Panel estudiantes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row justify-content-center">
          <div class="col-md-15">
            <div class="table-responsive mt-4">
            <div class="bg-white p-3 rounded">
                            <table id="studentsTable" class="table table-striped" style="width:100%">
                            <div>
                            <a href="{{ route('admin.student.create') }}" class="btn btn-primary mb-3" style="color: white;">
                                Nuevo estudiante
                              </a>
                            </div>
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Nombre y Apellido</th>
                                        <th scope="col" class="text-center">Edad</th>
                                        <th scope="col" class="text-center">Grado</th>
                                        <th scope="col" class="text-center">Representante</th>
                                        <th scope="col" class="text-center">Opciones</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td class="text-center">{{$student->nombre}} {{$student->apellido}}</td>
                                        <td class="text-center">{{$student->edad}} {{ __('Años') }}</td>
                                        <td class="text-center">{{$student->grado}} {{ __('Grado') }}</td>
                                        <td class="text-center">
                                            @if($student->representante)
                                                {{ $student->representante->nombre }} {{ $student->representante->apellido }}
                                            @else
                                                No asignado
                                            @endif
                                        </td>
                                        <td class="text-center">
                                        <form method="POST" action="{{ route('admin.student.destroy', $student) }}" id="delete-form-{{ $student->id }}">
                                            <a class="btn btn-info" href="{{ route('admin.student.show', $student->id) }}">Ver más</a>
                                            <button type="button" class="btn btn-warning" onclick="openAssignModal({{ $student->id }})">Asignar Representante</button>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="button" onclick="confirmDelete({{ $student->id }})">Eliminar Estudiante</button>
                                        </form>
                                        </td>                            
                                    </tr>
                                    @endforeach
                                </tbody>   
                            </table>
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
    <div class="modal fade" id="assignRepresentativeModal" tabindex="-1" role="dialog" aria-labelledby="assignRepresentativeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignRepresentativeModalLabel">Asignar Representante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="assignRepresentativeForm" method="POST">
                    @csrf
                    <input type="hidden" name="student_id" id="student_id">
                    <div class="form-group">
                        <label for="representante_id">Seleccionar Representante</label>
                        <select name="representante_id" id="representante_id" class="form-control">
                            @foreach($users as $user) <!-- Cambié $representante a $user -->
                                <option value="{{ $user->id }}">{{ $user->nombre }} {{ $user->apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Asignar</button>
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

function openAssignModal(studentId) {
    // Establecer el ID del estudiante en el campo oculto del formulario
    document.getElementById('student_id').value = studentId;

    // Mostrar el modal
    $('#assignRepresentativeModal').modal('show');
}

// Manejar el envío del formulario
document.getElementById('assignRepresentativeForm').onsubmit = function(event) {
    event.preventDefault(); // Evitar el envío normal del formulario

    // Obtener el ID del estudiante
    const studentId = document.getElementById('student_id').value;

    // Enviar el formulario usando AJAX o redirigir a la ruta de asignación
    this.action = `/admin/student/${studentId}/assign`; // Asegúrate de que esta ruta sea correcta
    this.submit(); // Enviar el formulario
};
</script>
</body>
</html>


    

