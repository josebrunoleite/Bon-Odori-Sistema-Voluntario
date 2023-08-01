@extends('adminlte::page')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pagina de Alteração de Voluntário!</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <form method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <!--Nome-->
                        <div class="form-group col-md-6">
                            <label for="inputName">Nome</label>
                            <input type="text" class="form-control disable" id="inputName" id="name" name="name"
                                value="{{ $user->name }}" placeholder="name" readonly>
                        </div>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <!--Email-->
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email"
                                value="{{ $user->email }}"readonly>
                        </div>
                    </div>
                        <!--Pagamento Manhã-->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Pagamento Manhã</label>
                                <select class="custom-select" name="pagamento01" id="pagamento01">
                                    <option value="01" {{ $user->pagamento01 === '01' ? 'selected' : '' }}>01</option>
                                    <option value="02" {{ $user->pagamento01 === '02' ? 'selected' : '' }}>02</option>
                                    <option value="03" {{ $user->pagamento01 === '03' ? 'selected' : '' }}>03</option>
                                    <option value="04" {{ $user->pagamento01 === '04' ? 'selected' : '' }}>04</option>
                                    <option value="05" {{ $user->pagamento01 === '05' ? 'selected' : '' }}>05</option>
                                    <option value="06" {{ $user->pagamento01 === '06' ? 'selected' : '' }}>06</option>
                                    <option value="07" {{ $user->pagamento01 === '07' ? 'selected' : '' }}>07</option>
                                    <option value="08" {{ $user->pagamento01 === '08' ? 'selected' : '' }}>08</option>
                                    <option value="09" {{ $user->pagamento01 === '09' ? 'selected' : '' }}>09</option>
                                    <option value="10" {{ $user->pagamento01 === '10' ? 'selected' : '' }}>10</option>
                                </select>
                            </div>
                            <!--Setor01-->
                            <!--Pagamento Tarde-->
                            <div class="form-group col-md-4">
                                <label>Pagamento Tarde</label>
                                <select class="custom-select" name="pagamento02" id="pagamento02">
                                    <option value="01" {{ $user->pagamento02 === '01' ? 'selected' : '' }}>01</option>
                                    <option value="02" {{ $user->pagamento02 === '02' ? 'selected' : '' }}>02</option>
                                    <option value="03" {{ $user->pagamento02 === '03' ? 'selected' : '' }}>03</option>
                                    <option value="04" {{ $user->pagamento02 === '04' ? 'selected' : '' }}>04</option>
                                    <option value="05" {{ $user->pagamento02 === '05' ? 'selected' : '' }}>05</option>
                                    <option value="06" {{ $user->pagamento02 === '06' ? 'selected' : '' }}>06</option>
                                    <option value="07" {{ $user->pagamento02 === '07' ? 'selected' : '' }}>07</option>
                                    <option value="08" {{ $user->pagamento02 === '08' ? 'selected' : '' }}>08</option>
                                    <option value="09" {{ $user->pagamento02 === '09' ? 'selected' : '' }}>09</option>
                                    <option value="10" {{ $user->pagamento02 === '10' ? 'selected' : '' }}>10</option>

                                </select>
                            </div>
                            <!--Setor01-->
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
                <!--<form id="deleteForm" action="{{ route('deletefiV', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-right">Deletar!</button>
                    </form>-->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
@endsection
