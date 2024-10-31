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
                                    @foreach ($maquinasLimit as $dado)
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
                        <div class="pagination">
                            {{ $maquinasLimit->links() }}
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
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
<script>
    const maquinas = @json($maquinasdata);

    const series = [
        { name: `${maquinas.maquina_id} - Temperatura`, data: maquinas.temperatura },
        { name: `${maquinas.maquina_id} - Umidade`, data: maquinas.umidade },
        { name: `${maquinas.maquina_id} - Ruído`, data: maquinas.ruido }
    ];

    const chartOptions = {
        series: series,
        chart: { height: 300, type: "area", toolbar: { show: false } },
        legend: { show: true },
        colors: ["#0d6efd", "#20c997", "#ffc107"],
        dataLabels: { enabled: false },
        stroke: { curve: "smooth" },
        xaxis: { type: "datetime", categories: maquinas.created_at },
        tooltip: { x: { format: "dd/MM" } },
    };

    new ApexCharts(document.querySelector("#revenue-chart"), chartOptions).render();
</script>

    <script src="{{ asset('public/jsccs/jquery/dist/js/jquery.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/jsccs/js/adminlte.min.js') }}"></script>
    <style>
        #example1_filter {
            float: right
        }
    </style>

@stop
