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
                        <form method="POST" action="{{ route('voluntario.update', ['id' => $user->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <!--Nome-->
                                <div class="form-group col-md-6">
                                    <label for="inputName">Nome</label>
                                    <input type="text" class="form-control" id="inputName" id="name" name="name"
                                        value="{{ $user->name }}" placeholder="name">
                                </div>
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <!--Email-->
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail"
                                        placeholder="Email" value="{{ $user->email }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--Cargo-->
                                <div class="form-row">
                                    <!--Setor01-->
                                    <div class="form-group col-md-4">
                                        <label>Setor</label>
                                        <select class="custom-select" name="setor1" id="setor1">
                                            <option value="-" {{ $user->setor1 === '-' ? 'selected' : '' }}>Não é do
                                                turno
                                            </option>
                                            <option value="Geral" {{ $user->setor1 === 'Geral' ? 'selected' : '' }}>Geral
                                            </option>
                                            <option value="Federação"
                                                {{ $user->setor1 === 'Federação' ? 'selected' : '' }}>Federação</option>
                                            <option value="Cultural" {{ $user->setor1 === 'Cultural' ? 'selected' : '' }}>
                                                Cultural</option>
                                            <option value="Alimentação"
                                                {{ $user->setor1 === 'Alimentação' ? 'selected' : '' }}>Alimentação
                                            </option>
                                            <option value="Conteúdo, Shows e Outros"
                                                {{ $user->setor1 === 'Conteúdo, Shows e Outros' ? 'selected' : '' }}>
                                                Conteúdo, Shows e Outros</option>
                                            <option value="Oficinas de Culinária"
                                                {{ $user->setor1 === 'Oficinas de Culinária' ? 'selected' : '' }}>Oficinas
                                                de Culinária</option>
                                            <option value="Marketing"
                                                {{ $user->setor1 === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                            <option value="Espaço Pop"
                                                {{ $user->setor1 === 'Espaço Pop' ? 'selected' : '' }}>Espaço Pop</option>
                                            <option value="Comercial"
                                                {{ $user->setor1 === 'Comercial' ? 'selected' : '' }}>Comercial</option>
                                            <option value="-" {{ $user->setor1 === '-' ? 'selected' : '' }}>-</option>
                                        </select>
                                    </div>
                                    <!--Setor02-->
                                    <div class="form-group col-md-4">
                                        <label>Setor 2</label>
                                        <select class="custom-select" name="setor2" id="setor2">
                                            <option value="-" {{ $user->setor2 === '-' ? 'selected' : '' }}>Não é do
                                                turno
                                            </option>
                                            <option value="Geral" {{ $user->setor2 === 'Geral' ? 'selected' : '' }}>Geral
                                            </option>
                                            <option value="Federação"
                                                {{ $user->setor2 === 'Federação' ? 'selected' : '' }}>Federação</option>
                                            <option value="Cultural" {{ $user->setor2 === 'Cultural' ? 'selected' : '' }}>
                                                Cultural</option>
                                            <option value="Alimentação"
                                                {{ $user->setor2 === 'Alimentação' ? 'selected' : '' }}>Alimentação
                                            </option>
                                            <option value="Conteúdo, Shows e Outros"
                                                {{ $user->setor2 === 'Conteúdo, Shows e Outros' ? 'selected' : '' }}>
                                                Conteúdo, Shows e Outros</option>
                                            <option value="Oficinas de Culinária"
                                                {{ $user->setor2 === 'Oficinas de Culinária' ? 'selected' : '' }}>Oficinas
                                                de Culinária</option>
                                            <option value="Marketing"
                                                {{ $user->setor2 === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                            <option value="Espaço Pop"
                                                {{ $user->setor2 === 'Espaço Pop' ? 'selected' : '' }}>Espaço Pop</option>
                                            <option value="Comercial"
                                                {{ $user->setor2 === 'Comercial' ? 'selected' : '' }}>Comercial</option>
                                            <option value="-" {{ $user->setor2 === '-' ? 'selected' : '' }}>-
                                            </option>
                                        </select>
                                    </div>
                                    <!--Setor03-->
                                    <div class="form-group col-md-4">
                                        <label>Setor 3</label>
                                        <select class="custom-select" name="setor3" id="setor3">
                                            <option value="-" {{ $user->setor3 === '-' ? 'selected' : '' }}>
                                                Não está alocado em outro lugar
                                            </option>
                                            <option value="Geral" {{ $user->setor3 === 'Geral' ? 'selected' : '' }}>Geral
                                            </option>
                                            <option value="Federação"
                                                {{ $user->setor3 === 'Federação' ? 'selected' : '' }}>Federação</option>
                                            <option value="Cultural" {{ $user->setor3 === 'Cultural' ? 'selected' : '' }}>
                                                Cultural</option>
                                            <option value="Alimentação"
                                                {{ $user->setor3 === 'Alimentação' ? 'selected' : '' }}>
                                                Alimentação
                                            </option>
                                            <option value="Conteúdo, Shows e Outros"
                                                {{ $user->setor3 === 'Conteúdo, Shows e Outros' ? 'selected' : '' }}>
                                                Conteúdo, Shows e Outros</option>
                                            <option value="Oficinas de Culinária"
                                                {{ $user->setor3 === 'Oficinas de Culinária' ? 'selected' : '' }}>Oficinas
                                                de Culinária</option>
                                            <option value="Marketing"
                                                {{ $user->setor3 === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                            <option value="Espaço Pop"
                                                {{ $user->setor3 === 'Espaço Pop' ? 'selected' : '' }}>Espaço Pop</option>
                                            <option value="Comercial"
                                                {{ $user->setor3 === 'Comercial' ? 'selected' : '' }}>Comercial</option>
                                            <option value="-" {{ $user->setor3 === '-' ? 'selected' : '' }}>-
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Cargo</label>
                                        <select class="custom-select" name="role" id="role">
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin
                                            </option>
                                            <option value="mod" {{ $user->role === 'mod' ? 'selected' : '' }}>mod
                                            </option>
                                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Fuso Horario</label>
                                        <select class="custom-select" name="on" id="on">
                                            <option value="M" {{ $user->on === 'M' ? 'selected' : '' }}>Manhã</option>
                                            <option value="N" {{ $user->on === 'N' ? 'selected' : '' }}>Noturno
                                            </option>
                                            <option value="D" {{ $user->on === 'D' ? 'selected' : '' }}>Dobrar
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Sexta</label>
                                        <input type="checkbox" name="checkbox_data[]" value="sexta"
                                            @if (in_array('sexta', $checkboxData)) checked @endif>
                                        <label>Sabado</label>
                                        <input type="checkbox" name="checkbox_data[]" value="sabado"
                                            @if (in_array('sabado', $checkboxData)) checked @endif>
                                        <label>Domingo</label>
                                        <input type="checkbox" name="checkbox_data[]" value="domingo"
                                            @if (in_array('domingo', $checkboxData)) checked @endif>
                                        <label>Ausente</label>
                                        <input type="checkbox" name="checkbox_data[]" value="ausente"
                                            @if (in_array('ausente', $checkboxData)) checked @endif>
                                    </div>
                                </div>
                                <div class="form-row">

                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row g-3 align-items-center left">
                                        <div class="col-auto">
                                            <label for="inputPassword" class="col-form-label">Senha</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="password" name="password" id="inputPassword6"
                                                class="form-control" aria-labelledby="passwordHelpInline">
                                        </div>
                                        <!-- <div class="col-auto">
                                                    <span id="passwordHelpInline" class="form-text">
                                                        
                                                    </span>-->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                                <label class="form-check-label" for="gridCheck">
                                                    Check me out
                                                </label>
                                            </div>-->
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                        <form id="entrada" action="{{ route('atualizarManual', ['id' => $user->id]) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info float-right">autorizar entrada!</button>
                        </form>
                    </div>
                </div>
                <form id="deleteForm" action="{{ route('deletefiV', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger float-right">Deletar!</button>
                </form>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
@endsection
