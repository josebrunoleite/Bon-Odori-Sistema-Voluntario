@extends('adminlte::page')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pagina de Pagamentos!</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
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
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pagamentofiVStore', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <!--Nome-->
                                <div class="form-group col-md-6">
                                    <label for="inputName">Nome</label>
                                    <input type="text" class="form-control disable" id="inputName" id="name"
                                        name="name" value="{{ $user->name }}" placeholder="name" readonly>
                                </div>
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <!--Email-->
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail"
                                        placeholder="Email" value="{{ $user->email }}"readonly>
                                </div>
                            </div>
                            <!--Pagamento Manhã-->
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <h5>Pagamento Sabado</h5>
                                    <label>Comida Almoço </label>
                                    <input type="checkbox" name="checkbox_data[]" value="comidaDia2"
                                        @if (in_array('comidaDia2', $checkboxData)) checked @endif>
                                    <label>&nbsp;/ Transporte </label>
                                    <input type="checkbox" name="checkbox_data[]" value="Transporte2"
                                        @if (in_array('Transporte2', $checkboxData)) checked @endif>
                                        <label>/ Comida Jantar</label>
                                    <input type="checkbox" name="checkbox_data[]" value="comidaNoite2"
                                        @if (in_array('comidaNoite2', $checkboxData)) checked @endif>
                                </div>
                                <div class="form-group col-md-4">
                                    <h5>Pagamento Domingo</h5>
                                    <label>Comida Almoço </label>
                                    <input type="checkbox" name="checkbox_data[]" value="comidaDia3"
                                        @if (in_array('comidaDia3', $checkboxData)) checked @endif>
                                    <label>&nbsp;/ Transporte </label>
                                    <input type="checkbox" name="checkbox_data[]" value="Transporte3"
                                        @if (in_array('Transporte3', $checkboxData)) checked @endif>
                                        <label>/ Comida Jantar</label>
                                    <input type="checkbox" name="checkbox_data[]" value="comidaNoite3"
                                        @if (in_array('comidaNoite3', $checkboxData)) checked @endif>
                                </div>
                                <!--Setor01-->
                                <!--Pagamento Tarde
                                <div class="form-group col-md-4">
                                    <h5>Pagamento Tarde</h5>
                                    <label>Comida</label>
                                    <input type="checkbox" name="checkbox_data[]" value="opcao_comida2"
                                        {{-- @if (in_array('opcao_comida2', $checkboxData)) checked @endif> --}}
                                    <label>&nbsp;Agua</label>
                                    <input type="checkbox" name="checkbox_data[]" value="opcao_bebida2"
                                       {{--  @if (in_array('opcao_bebida2', $checkboxData)) checked @endif> --}}
                                </div>-->
                                <div class="form-group col-md-4">
                                    <h5>Extra</h5>
                                    <label>Pulseira Sabado</label>
                                    <input type="checkbox"  name="checkbox_data[]" value="PulseiraSabado"
                                        @if (in_array('PulseiraSabado', $checkboxData)) checked @endif>
                                        <label>/ Pulseira Domingo </label>
                                        <input type="checkbox"  name="checkbox_data[]" value="PulseiraDomingo"
                                            @if (in_array('PulseiraDomingo', $checkboxData)) checked @endif>
                                    </br><label>&nbsp;/ Anone</label>
                                    <input type="checkbox" name="checkbox_data[]" value="Anone"
                                        @if (in_array('Anone', $checkboxData)) checked @endif>
                                        <label>/ Hapi</label>
                                        <input type="checkbox"  name="checkbox_data[]" value="hapi"
                                            @if (in_array('hapi', $checkboxData)) checked @endif>
                                </div>
                                <!--Setor01-->
                            </div>
                            {{-- <input type="checkbox" name="checkbox_data[]" value="opcao_a"
                                @if (in_array('opcao_a', $checkboxData)) checked @endif> --}}

                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
@endsection
