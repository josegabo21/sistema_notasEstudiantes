
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>StudyChard | Estudiantes {{ auth()->user()->grado_asignado }} {{ __('Grado') }}</title>
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
  @if (auth()->user()->grado_asignado === 'Todos los grados')
    @include('profesor.layouts.side-nav-extra')
  @else
  @include('profesor.layouts.side-nav')
  @endif

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
              <li class="breadcrumb-item"> <x-nav-link :href="route('profesor.dashboard')" :active="request()->routeIs('dashboard')">
                      {{ __('Inicio') }}
                    </x-nav-link></li>
              <li class="breadcrumb-item active">Estudiantes {{ auth()->user()->grado_asignado }} {{ __('Grado') }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            @if (auth()->user()->grado_asignado === 'Todos los grados')
                @foreach ($studentsByGrade as $grado => $students)
                    <div class="col-md-2">
                        <button class="btn btn-primary toggle-table w-100" data-grade="{{ $grado }}">{{ $grado }} Grado</button>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row">
            @foreach ($studentsByGrade as $grado => $students)
                <div class="col-md-12">
                    @if (auth()->user()->grado_asignado === 'Todos los grados')
                        <div class="bg-white p-3 rounded mt-4 grade-table" id="table-{{ $grado }}" style="display: none;">
                            <table id="studentsTable-{{ $grado }}" class="table table-striped" style="width:100%">
                            <button class="btn btn-success mb-3" onclick="generatePDF('{{ $grado }}')">Generar PDF</button>
                     
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Nombre</th>
                                        <th scope="col" class="text-center">Apellido</th>
                                        <th scope="col" class="text-center">Edad</th>
                                        <th scope="col" class="text-center">Grado</th>
                                        <th scope="col" class="text-center">Fecha de Nacimiento</th>
                                        <th scope="col" class="text-center">Cédula</th>
                                        <th scope="col" class="text-center">Dirección</th>
                                        <th scope="col" class="text-center">Teléfono del representante</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td class="text-center">{{ $student->nombre }}</td>
                                            <td class="text-center">{{ $student->apellido }}</td>
                                            <td class="text-center">{{ $student->edad }} {{ __('Años') }}</td>
                                            <td class="text-center">{{ $student->grado }} {{ __('Grado') }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($student->fecha_nacimiento)->format('d/m/Y') }}</td>
                                            <td class="text-center">{{ $student->cedula ? $student->cedula : 'No aplica' }}</td>
                                            <td class="text-center">
                                            @if($student->representante)
                                            <span>{{ $student->representante->direccion }}</span>
                                            @else
                                                <span class="mr-2">No asignado</span>
                                            @endif</td>
                                            <td class="text-center">@if($student->representante)
                                            <span class="mr-2">+58</span>
                                            <span>{{ $student->representante->telefono_representante }}</span>
                                            @else
                                                <span class="mr-2">No asignado</span>
                                            @endif</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="bg-white p-3 rounded mt-4">
                            <table id="studentsTable" class="table table-striped" style="width:100%">
                            <button class="btn btn-success mb-3" onclick="generatePDFWithoutAddressAndBirthDate()">Generar PDF</button>
                                <thead>
                                    <tr>
                                    <th scope="col" class="text-center">Nombre</th>
                                    <th scope="col" class="text-center">Apellido</th>
                                        <th scope="col" class="text-center">Edad</th>
                                        <th scope="col" class="text-center">Grado</th>
                                        <th scope="col" class="text-center">Fecha de Nacimiento</th>
                                        <th scope="col" class="text-center">Cédula</th>
                                        <th scope="col" class="text-center">Dirección</th>
                                        <th scope="col" class="text-center">Teléfono del representante</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td class="text-center">{{ $student->nombre }}</td>
                                            <td class="text-center">{{ $student->apellido }}</td>
                                            <td class="text-center">{{ $student->edad }} {{ __('Años') }}</td>
                                            <td class="text-center">{{ $student->grado }} {{ __('Grado') }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($student->fecha_nacimiento)->format('d/m/Y') }}</td>
                                            <td class="text-center">{{ $student->cedula ? $student->cedula : 'No aplica' }}</td>
                                            <td class="text-center">
                                            @if($student->representante)
                                            <span>{{ $student->representante->direccion }}</span>
                                            @else
                                                <span class="mr-2">No asignado</span>
                                            @endif</td>
                                            <td class="text-center">@if($student->representante)
                                            <span class="mr-2">+58</span>
                                            <span>{{ $student->representante->telefono_representante }}</span>
                                            @else
                                                <span class="mr-2">No asignado</span>
                                            @endif</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
 $(document).ready(function() {
        // Inicializar DataTables para cada tabla de grado
        @if (auth()->user()->grado_asignado === 'Todos los grados')
            @foreach ($studentsByGrade as $grado => $students)
                $('#studentsTable-{{ $grado }}').DataTable({
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
            @endforeach
        @else
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
        @endif

        // Lógica para mostrar/ocultar tablas
        $('.toggle-table').click(function() {
            var grade = $(this).data('grade');
            // Oculta todas las tablas
            $('.grade-table').hide();
            // Muestra la tabla correspondiente
            $('#table-' + grade).toggle();

            // Remueve las clases de todos los botones
            $('.toggle-table').removeClass('btn-light shadow').addClass('btn-primary');
            // Agrega las clases al botón que fue clickeado
            $(this).removeClass('btn-primary').addClass('btn-light shadow');
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


    function generatePDF(grade) {
    // Selecciona la tabla que deseas convertir a PDF
    const table = document.getElementById('studentsTable-' + grade); // Usar el grado pasado como parámetro
    const rows = table.rows;

    // Ocultar las columnas de Fecha de Nacimiento (índice 4) y Dirección (índice 6)
    for (let i = 0; i < rows.length; i++) {
        if (rows[i].cells.length > 4) {
            rows[i].cells[4].style.display = 'none'; // Fecha de Nacimiento
        }
        if (rows[i].cells.length > 6) {
            rows[i].cells[6].style.display = 'none'; // Dirección
        }
    }

    // Configuración de opciones para el PDF
    const opt = {
        margin: 1,
        filename: 'reporte_estudiantes_' + grade + ' grado.pdf', // Cambiar el nombre del archivo para incluir el grado
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    // Generar el PDF
    html2pdf()
        .set(opt)
        .from(table)
        .save()
        .then(() => {
            // Mostrar las columnas nuevamente después de generar el PDF
            for (let i = 0; i < rows.length; i++) {
                if (rows[i].cells.length > 4) {
                    rows[i].cells[4].style.display = ''; // Fecha de Nacimiento
                }
                if (rows[i].cells.length > 6) {
                    rows[i].cells[6].style.display = ''; // Dirección
                }
            }
        });
}

function generatePDFWithoutAddressAndBirthDate() {
        // Selecciona la tabla que deseas convertir a PDF
        const table = document.getElementById('studentsTable'); // Tabla única en el bloque else
        const rows = table.rows;

        // Ocultar las columnas de Fecha de Nacimiento (índice 4) y Dirección (índice 6)
        for (let i = 0; i < rows.length; i++) {
            if (rows[i].cells.length > 4) {
                rows[i].cells[4].style.display = 'none'; // Fecha de Nacimiento
            }
            if (rows[i].cells.length > 6) {
                rows[i].cells[6].style.display = 'none'; // Dirección
            }
        }

        // Configuración de opciones para el PDF
        const opt = {
            margin: 1,
            filename: 'reporte_estudiantes {{ $grado}} grado.pdf', // Cambiar el nombre del archivo
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };

        // Generar el PDF
        html2pdf()
            .set(opt)
            .from(table)
            .save()
            .then(() => {
                // Mostrar las columnas nuevamente después de generar el PDF
                for (let i = 0; i < rows.length; i++) {
                    if (rows[i].cells.length > 4) {
                        rows[i].cells[4].style.display = ''; // Fecha de Nacimiento
                    }
                    if (rows[i].cells.length > 6) {
                        rows[i].cells[6].style.display = ''; // Dirección
                    }
                }
            });
    }
</script>
</body>
</html>


    

