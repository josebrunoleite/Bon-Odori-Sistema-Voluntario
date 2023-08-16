{{-- @if (!empty($data['codigos']))
    <ul>
        @foreach ($data['codigos'] as $item)
            <li>Código: {{ $item['codigo'] }}, Status: {{ $item['status'] }}</li>
        @endforeach
    </ul>
@else
    <p>Nenhum dado encontrado.</p>
@endif --}}
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
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Status</th>
                                        <th>Qr_Code</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['codigos'] as $item)
                                        <tr>
                                            <td>{{ $item['codigo'] }}</td>
                                            <td>{{ $item['status'] }}</td>
                                            <td>{{-- {{ $item['status'] } --}} Em Implementação
                                                 {!! QrCode::size(200)->generate('https://seinenkai.com.br/qrcodeleitor/' . $item['codigo']) !!}
                                             <div class="visible-print text-center">
                                                    <div class="item-details" style="display: ;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
    const showButtons = document.querySelectorAll('.show-button');
    
    showButtons.forEach(button => {
        button.addEventListener('click', () => {
            const itemDiv = button.closest('.item');
            const itemDetails = itemDiv.querySelector('.item-details');
    
            if (itemDetails.style.display === 'none') {
                itemDetails.style.display = 'block';
            } else {
                itemDetails.style.display = 'none';
            }
        });
    });
    </script>
    
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "paging": true,
                "ordering": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
       <style>
        #example1_filter {
            float: right;
        }
        .main-sidebar {
            display: none;
        }
    </style>
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
    <script src="{{ asset('jsccs/pdfmake/vfs_fonts.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/jsccs/js/adminlte.min.js') }}"></script>
    
    
@stop

