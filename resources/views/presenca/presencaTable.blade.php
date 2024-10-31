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
                        <h3>{{ $usuariosComSaida->count() }}</h3>
                        <p>Usuarios Com Saida Registrada Hoje!</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $usuariosSemSaida->count() }}</h3>
                        <p>Usuarios Sem Saida Registrada Hoje!</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $users->count() }}</h3>
                        <p>Total de pessoas que já estiveram no evento</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $usersdata }}</h3>
                        <p>Total de pessoas prevista</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $registrosSaidaOntem->count() }}</h3>
                        <p>Pessoas que não Registram Saida ontem</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>Ignore</h3>
                        <p>Pessoas que não Registram Saida ontem</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
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
                            <h3 class="card-title">Tabela de Voluntarios</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="">Nome</th>
                                        <th class="d-none d-md-table-cell">subsetor Manhã</th>
                                        <th class="d-none d-md-table-cell">subsetor Noite</th>
                                        <th class="d-none d-md-table-cell">Entrada</th>
                                        <th class="d-none d-md-table-cell">Saida</th>
                                        <th class="d-md-table-cell">Sistema em Implementação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>

                                            <td>{{ $user->name ?? 'Error Contate José' }}</td>
                                            <td class="d-none d-md-table-cell">
                                                {{ $user->subsetor1 ?? 'Error Contate José' }}
                                            </td>
                                            <td class="d-none d-md-table-cell">
                                                {{ $user->subsetor2 ?? 'Error Contate José' }}
                                            </td>
                                            <td class="d-none d-md-table-cell">{{ $user->entrada ?? 'Error Contate José' }}
                                            </td>
                                            <td class="d-none d-md-table-cell">
                                                {{ $user->saida == '2000-01-01 00:00:00' ? 'Advertência: Não registrou saída!' : $user->saida ?? 'Pessoa não registrou saída' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                            <h3 class="card-title">Tabela de Voluntarios que não registram saida ontem</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="">Nome</th>
                                        <th class="d-none d-md-table-cell">subsetor Manhã</th>
                                        <th class="d-none d-md-table-cell">subsetor Noite</th>
                                        <th class="d-none d-md-table-cell">Entrada</th>
                                        <th class="d-none d-md-table-cell">Saida</th>
                                        <th class="d-md-table-cell">Advertencia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrosSaidaOntem as $user)
                                        <tr>
                                            <td>{{ $user->name ?? 'Error Contate José' }}</td>
                                            <td class="d-none d-md-table-cell">
                                                {{ $user->subsetor1 ?? 'Error Contate José' }}
                                            </td>
                                            <td class="d-none d-md-table-cell">
                                                {{ $user->subsetor2 ?? 'Error Contate José' }}
                                            </td>
                                            <td class="d-none d-md-table-cell">{{ $user->entrada ?? 'Error Contate José' }}
                                            </td>
                                            <td class="d-none d-md-table-cell">
                                                {{ $user->saida ?? 'Pessoa não registrou saida ontem' }}</td>
                                            <td class="d-md-table-cell"><a href="{{ url('/presen/waringpres/' . $user->id) }}">Advertencia!</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
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
