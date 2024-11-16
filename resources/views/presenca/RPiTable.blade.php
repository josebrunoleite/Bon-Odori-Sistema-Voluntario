@extends('adminlte::page')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div>
    </section>
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $maquinasTotal->count() }}</h3>
                        <p>Maquinas Registradas!</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        {{-- <h3>{{ $users->count() }}</h3> --}}
                        <p>Nanana</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        {{-- <h3>{{ $usersdata }}</h3> --}}
                        <p>Nanana</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <br>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h3 class="card-title">Tabela de Maquina</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="">id</th>
                                        <th class="">Nome</th>
                                        <th class="d-none d-md-table-cell">Localização</th>
                                        <th class="d-none d-md-table-cell">Visualizar</th>
                                        <th class="d-none d-md-table-cell">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($maquinasTotal as $maquina)
                                        @if($maquina->rpiMaquinaDado2->count() > 0)
                                        <tr>
                                            <td>{{ $maquina->id ?? 'Error Contate José' }}</td>

                                            <td>{{ $maquina->nome ?? 'Error Contate José' }}</td>
                                            <td class="d-none d-md-table-cell">
                                                {{ $maquina->localizacao ?? 'Error Contate José' }}
                                            </td>
                                            <td><a href="{{ route('rpi.OnlyKnows', $maquina->id) }}">Visualizar</a></td>
                                            <td><a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                                    href="{{ route('rpi.OnlyKnows', $maquina->id) }}">Editar</a></td>

                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "paging": true,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(2)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script src="{{ asset('public/jsccs/jquery/dist/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <!-- Bootstrap 4 -->
    <script src="{{ asset('public/jsccs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('jsccs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('jsccs/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('jsccs/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('jsccs/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('jsccs/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('jsccs/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('jsccs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('jsccs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('jsccs/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('jsccs/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('jsccs/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('jsccs/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/jsccs/js/adminlte.min.js') }}"></script>
    <style>
        #example1_filter {
            float: right
        }
    </style>

@stop
