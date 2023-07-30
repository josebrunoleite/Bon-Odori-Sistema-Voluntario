@extends('adminlte::page')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="justify-content: center">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h1>Criar Pedido</h1>
                            <form action="{{ route('salvar_pedido') }}" method="POST">
                                @csrf
                                <div class="form-group col-md-12">
                                    <select class="custom-select" name="pedido" id="pedido">
                                        <option value="alterar_local">Alterar Local</option>
                                        <option value="alterar_funcao">Alterar Função</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Descrição</label>
                            <textarea class="form-control" name="descricao" aria-label="With textarea"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar pedido</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
