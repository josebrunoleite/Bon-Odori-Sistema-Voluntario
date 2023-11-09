@extends('adminlte::page')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!--<div class="col-sm-6">
                            <h1>Tabela de Voluntarios</h1>
                        </div>-->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="{{-- table-responsive --}}table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="">Nome</th>
                                        <th class="d-none d-md-table-cell">Setor Manhã</th>
                                        <th class="d-none d-md-table-cell">Setor Noite</th>
                                        <th class="d-none d-md-table-cell">Horarios</th>
                                        <th class="d-none d-md-table-cell">Identificação</th>
                                        <th class="d-md-table-cell">Editar/Pagamento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{@dd$users}}
                                    @foreach ($users as $user)
                                        <tr>

                                            <td>{{ $user->name ?? 'Error Contate José' }}</td>
                                            <td class="d-none d-md-table-cell">{{ $user->setor1 ?? 'Error Contate José' }}
                                            </td>
                                            <td class="d-none d-md-table-cell">{{ $user->setor2 ?? 'Error Contate José' }}
                                            </td>
                                            <td class="d-none d-md-table-cell">{{ $user->on ?? 'Error Contate José' }}</td>
                                            <td class="d-none d-md-table-cell">{{ $user->id ?? 'Error Contate José' }}</td>
                                            <td class="d-md-table-cell"><a
                                                    href="{{ url('modyfiV/' . $user->id) }}">Editar</a> //
                                                <a href="{{ url('pagamentofiV/' . $user->id) }}">Pagmento</a>
                                                <!-- <a href="#" class="text-danger" data-bs-toggle="modal"
                                                            data-bs-target="#confirmDeleteModal" id="deleteButton" data-bs-id="{{ $user->id }}">
                                                            Excluir</a>-->
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                {{--                                 <tfoot>
                                    <tr>
                                        <th>Editar/Pagamento</th>
                                        <th class="d-md-table-cell">Nome</th>
                                        <th class="d-none d-md-table-cell">Setor Manhã</th>
                                        <th class="d-none d-md-table-cell">Setor Noite</th>
                                        <th class="d-none d-md-table-cell">Horarios</th>
                                        <th class="d-none d-md-table-cell">Identificação</th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
    {{-- <style>
        #example1_filter {
            float: right
        }
    </style> --}}

@stop
