@extends('adminlte::page')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2">

                    <div class="col-lg-12 connectedSortable">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Valores</h3>
                            </div>
                            <div class="card-body">
                                <div id="revenue-chart"></div>
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
                            <h3 class="card-title">Tebela com os ultimos 15 minutos</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="">Nome</th>
                                        <th class="d-none d-md-table-cell">Temperatura</th>
                                        <th class="d-none d-md-table-cell">umidade</th>
                                        <th class="d-none d-md-table-cell">Ruido</th>
                                        <th class="d-md-table-cell">Deletar Dados</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($maquinasLimit->rpiMaquinaDado as $dado)
                                        <tr>
                                            <td>{{ $dado->id ?? 'Error Contate José' }}</td>
                                            <td class="d-none d-md-table-cell">
                                                {{ $dado->temperatura ?? 'Error Contate José' }}
                                            </td>
                                            <td class="d-none d-md-table-cell">
                                                {{ $dado->umidade ?? 'Error Contate José' }}
                                            </td>
                                            <td class="d-none d-md-table-cell">{{ $dado->ruido ?? 'Error Contate José' }}
                                            </td>
                                            <td class="d-md-table-cell"><a href="{{ url('/presen/waringpres/' . $dado->id) }}">Deletar!</a></td>
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


@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script> <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
        integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script> <!-- sortablejs -->
    <script>
        const connectedSortables =
            document.querySelectorAll(".connectedSortable");
        connectedSortables.forEach((connectedSortable) => {
            let sortable = new Sortable(connectedSortable, {
                group: "shared",
                handle: ".card-header",
            });
        });

        const cardHeaders = document.querySelectorAll(
            ".connectedSortable .card-header",
        );
        cardHeaders.forEach((cardHeader) => {
            cardHeader.style.cursor = "move";
        });
    </script> <!-- apexcharts -->
    <script>
   const maquinas = {
            maquina_id: "{{ $maquinasdata['maquina_id'] }}",
            data: [],
            temperatura: [],
            umidade: [],
            ruido: []
        };

        @foreach ($maquinasdata['created_at'] as $created_at)
            maquinas.data.push("{{ $created_at }}");
        @endforeach

        @foreach ($maquinasdata['temperatura'] as $temperatura)
            maquinas.temperatura.push({{ $temperatura }});
        @endforeach

        @foreach ($maquinasdata['umidade'] as $umidade)
            maquinas.umidade.push({{ $umidade }});
        @endforeach

        @foreach ($maquinasdata['ruido'] as $ruido)
            maquinas.ruido.push({{ $ruido }});
        @endforeach

        console.log(maquinas);

        const series = [];
        series.push({
            name: `${maquinas.maquina_id} - Temperatura`,
            data: maquinas.temperatura
        }, {
            name: `${maquinas.maquina_id} - Umidade`,
            data: maquinas.umidade
        }, {
            name: `${maquinas.maquina_id} - Ruído`,
            data: maquinas.ruido
        });


        const sales_chart_options = {
            series: series,
            chart: {
                height: 300,
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            legend: {
                show: true,
            },
            colors: ["#0d6efd", "#20c997", "#ffc107", "#dc3545", "#6f42c1", "#e83e8c"],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
            },
            xaxis: {
                type: "datetime",
                categories: maquinas.data,
            },
            tooltip: {
                x: {
                    format: "dd/MM",
                },
            },
        };


        const sales_chart = new ApexCharts(
            document.querySelector("#revenue-chart"),
            sales_chart_options,
        );
        sales_chart.render();
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
