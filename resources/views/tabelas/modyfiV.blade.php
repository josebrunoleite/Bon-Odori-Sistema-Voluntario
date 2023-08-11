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
                    <div class="card-body">
                <form method="POST" action="{{ route('voluntario.update', ['id' => $user->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <!--Nome-->
                        <div class="form-group col-md-6">
                            <label for="inputName">Nome</label>
                            <input type="text" class="form-control" id="inputName" id="name" name="name" value="{{$user->name}}" placeholder="name">
                        </div>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <!--Email-->
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{$user->email}}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <!--Cargo-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Cargo</label>
                            <select class="custom-select" name="role" id="role">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
                                <option value="mod" {{ $user->role === 'mod' ? 'selected' : '' }}>mod</option>
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user</option>
                            </select>
                        </div>
                        <!--Setor01-->
                        <div class="form-group col-md-4">
                            <label>Setor</label>
                            <select class="custom-select" name="setor1" id="setor1">
                                <option value="Geral" {{ $user->setor1 === 'Geral' ? 'selected' : '' }}>Geral</option>
                                <option value="Federação" {{ $user->setor1 === 'Federação' ? 'selected' : '' }}>Federação</option>
                                <option value="Cultural" {{ $user->setor1 === 'Cultural' ? 'selected' : '' }}>Cultural</option>
                                <option value="Alimentação" {{ $user->setor1 === 'Alimentação' ? 'selected' : '' }}>Alimentação</option>
                                <option value="Conteúdo, Shows e Outros" {{ $user->setor1 === 'Conteúdo, Shows e Outros' ? 'selected' : '' }}>Conteúdo, Shows e Outros</option>
                                <option value="Oficinas de Culinária" {{ $user->setor1 === 'Oficinas de Culinária' ? 'selected' : '' }}>Oficinas de Culinária</option>
                                <option value="Marketing" {{ $user->setor1 === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                <option value="Espaço Pop" {{ $user->setor1 === 'Espaço Pop' ? 'selected' : '' }}>Espaço Pop</option>
                                <option value="Comercial" {{ $user->setor1 === 'Comercial' ? 'selected' : '' }}>Comercial</option>
                            </select>
                        </div>
                        <!--SubSetor01-->
                        <div class="form-group col-md-4">
                            <label>SubSetor</label>
                            <select class="custom-select" name="subsetor1" id="subsetor1">
                                <option value="Subsetor" {{ $user->subsetor1 === 'Subsetor' ? 'selected' : '' }}>Subsetor</option>
                                <option value="Mochila" {{ $user->subsetor1 === 'Mochila' ? 'selected' : '' }}>Mochila</option>
                                <option value="COMERCIAL" {{ $user->subsetor1 === 'COMERCIAL' ? 'selected' : '' }}>COMERCIAL</option>
                                <option value="Kirigami" {{ $user->subsetor1 === 'Kirigami' ? 'selected' : '' }}>Kirigami</option>
                                <option value="Praça Anime" {{ $user->subsetor1 === 'Praça Anime' ? 'selected' : '' }}>Praça Anime</option>
                                <option value="Palco Haru" {{ $user->subsetor1 === 'Palco Haru' ? 'selected' : '' }}>Palco Haru</option>
                                <option value="Sustentabilidade" {{ $user->subsetor1 === 'Sustentabilidade' ? 'selected' : '' }}>Sustentabilidade</option>
                                <option value="Sumiê" {{ $user->subsetor1 === 'Sumiê' ? 'selected' : '' }}>Sumiê</option>
                                <option value="Chá" {{ $user->subsetor1 === 'Chá' ? 'selected' : '' }}>Chá</option>
                                <option value="EXPOSIÇÃO" {{ $user->subsetor1 === 'EXPOSIÇÃO' ? 'selected' : '' }}>EXPOSIÇÃO</option>
                                <option value="Tabuleiro" {{ $user->subsetor1 === 'Tabuleiro' ? 'selected' : '' }}>Tabuleiro</option>
                                <option value="Balcão" {{ $user->subsetor1 === 'Balcão' ? 'selected' : '' }}>Balcão</option>
                                <option value="Acessibilidade" {{ $user->subsetor1 === 'Acessibilidade' ? 'selected' : '' }}>Acessibilidade</option>
                                <option value="Institucional" {{ $user->subsetor1 === 'Institucional' ? 'selected' : '' }}>Institucional</option>
                                <option value="Origami" {{ $user->subsetor1 === 'Origami' ? 'selected' : '' }}>Origami</option>
                                <option value="Palco Natsu" {{ $user->subsetor1 === 'Palco Natsu' ? 'selected' : '' }}>Palco Natsu</option>
                                <option value="Japan House" {{ $user->subsetor1 === 'Japan House' ? 'selected' : '' }}>Japan House</option>
                                <option value="Fundação Japão" {{ $user->subsetor1 === 'Fundação Japão' ? 'selected' : '' }}>Fundação Japão</option>
                                <option value="Escola de Língua Japonesa" {{ $user->subsetor1 === 'Escola de Língua Japonesa' ? 'selected' : '' }}>Escola de Língua Japonesa</option>
                                <option value="Imprensa" {{ $user->subsetor1 === 'Imprensa' ? 'selected' : '' }}>Imprensa</option>
                                <option value="Espaço Bon Odori" {{ $user->subsetor1 === 'Espaço Bon Odori' ? 'selected' : '' }}>Espaço Bon Odori</option>
                                <option value="Stand" {{ $user->subsetor1 === 'Stand' ? 'selected' : '' }}>Stand</option>
                                <option value="Temari" {{ $user->subsetor1 === 'Temari' ? 'selected' : '' }}>Temari</option>
                                <option value="Praça principal" {{ $user->subsetor1 === 'Praça principal' ? 'selected' : '' }}>Praça principal</option>
                                <option value="Oriuno" {{ $user->subsetor1 === 'Oriuno' ? 'selected' : '' }}>Oriuno</option>
                                <option value="E-Temari" {{ $user->subsetor1 === 'E-Temari' ? 'selected' : '' }}>E-Temari</option>
                                <option value="Bonsai" {{ $user->subsetor1 === 'Bonsai' ? 'selected' : '' }}>Bonsai</option>
                                <option value="Oshibana" {{ $user->subsetor1 === 'Oshibana' ? 'selected' : '' }}>Oshibana</option>
                                <option value="Secretaria" {{ $user->subsetor1 === 'Secretaria' ? 'selected' : '' }}>Secretaria</option>
                                <option value="Altar Budista" {{ $user->subsetor1 === 'Altar Budista' ? 'selected' : '' }}>Altar Budista</option>
                            </select>
                        </div>
                        <!--Setor02-->
                        <div class="form-group col-md-4">
                            <label>Setor 2</label>
                            <select class="custom-select" name="setor2" id="setor2">
                                <option value="Geral" {{ $user->setor2 === 'Geral' ? 'selected' : '' }}>Geral</option>
                                <option value="Federação" {{ $user->setor2 === 'Federação' ? 'selected' : '' }}>Federação</option>
                                <option value="Cultural" {{ $user->setor2 === 'Cultural' ? 'selected' : '' }}>Cultural</option>
                                <option value="Alimentação" {{ $user->setor2 === 'Alimentação' ? 'selected' : '' }}>Alimentação</option>
                                <option value="Conteúdo, Shows e Outros" {{ $user->setor2 === 'Conteúdo, Shows e Outros' ? 'selected' : '' }}>Conteúdo, Shows e Outros</option>
                                <option value="Oficinas de Culinária" {{ $user->setor2 === 'Oficinas de Culinária' ? 'selected' : '' }}>Oficinas de Culinária</option>
                                <option value="Marketing" {{ $user->setor2 === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                <option value="Espaço Pop" {{ $user->setor2 === 'Espaço Pop' ? 'selected' : '' }}>Espaço Pop</option>
                                <option value="Comercial" {{ $user->setor2 === 'Comercial' ? 'selected' : '' }}>Comercial</option>
                            </select>
                        </div>
                        <!--SubSetor02-->
                        <div class="form-group col-md-4">
                            <label>SubSetor</label>
                            <select class="custom-select" name="subsetor2" id="subsetor2">
                                <option value="Subsetor" {{ $user->subsetor2 === 'Subsetor2' ? 'selected' : '' }}>Subsetor</option>
                                <option value="Mochila" {{ $user->subsetor2 === 'Mochila' ? 'selected' : '' }}>Mochila</option>
                                <option value="COMERCIAL" {{ $user->subsetor2 === 'COMERCIAL' ? 'selected' : '' }}>COMERCIAL</option>
                                <option value="Kirigami" {{ $user->subsetor2 === 'Kirigami' ? 'selected' : '' }}>Kirigami</option>
                                <option value="Praça Anime" {{ $user->subsetor2 === 'Praça Anime' ? 'selected' : '' }}>Praça Anime</option>
                                <option value="Palco Haru" {{ $user->subsetor2 === 'Palco Haru' ? 'selected' : '' }}>Palco Haru</option>
                                <option value="Sustentabilidade" {{ $user->subsetor2 === 'Sustentabilidade' ? 'selected' : '' }}>Sustentabilidade</option>
                                <option value="Sumiê" {{ $user->subsetor2 === 'Sumiê' ? 'selected' : '' }}>Sumiê</option>
                                <option value="Chá" {{ $user->subsetor2 === 'Chá' ? 'selected' : '' }}>Chá</option>
                                <option value="EXPOSIÇÃO" {{ $user->subsetor2 === 'EXPOSIÇÃO' ? 'selected' : '' }}>EXPOSIÇÃO</option>
                                <option value="Tabuleiro" {{ $user->subsetor2 === 'Tabuleiro' ? 'selected' : '' }}>Tabuleiro</option>
                                <option value="Balcão" {{ $user->subsetor2 === 'Balcão' ? 'selected' : '' }}>Balcão</option>
                                <option value="Acessibilidade" {{ $user->subsetor2 === 'Acessibilidade' ? 'selected' : '' }}>Acessibilidade</option>
                                <option value="Institucional" {{ $user->subsetor2 === 'Institucional' ? 'selected' : '' }}>Institucional</option>
                                <option value="Origami" {{ $user->subsetor2 === 'Origami' ? 'selected' : '' }}>Origami</option>
                                <option value="Palco Natsu" {{ $user->subsetor2 === 'Palco Natsu' ? 'selected' : '' }}>Palco Natsu</option>
                                <option value="Japan House" {{ $user->subsetor2 === 'Japan House' ? 'selected' : '' }}>Japan House</option>
                                <option value="Fundação Japão" {{ $user->subsetor2 === 'Fundação Japão' ? 'selected' : '' }}>
                                    Fundação Japão</option>
                                <option value="Escola de Língua Japonesa" {{ $user->subsetor2 === 'Escola de Língua Japonesa' ? 'selected' : '' }}>Escola de Língua Japonesa</option>
                                <option value="Imprensa" {{ $user->subsetor2 === 'Imprensa' ? 'selected' : '' }}>Imprensa</option>
                                <option value="Espaço Bon Odori" {{ $user->subsetor2 === 'Espaço Bon Odori' ? 'selected' : '' }}>Espaço Bon Odori</option>
                                <option value="Stand" {{ $user->subsetor2 === 'Stand' ? 'selected' : '' }}>Stand</option>
                                <option value="Temari" {{ $user->subsetor2 === 'Temari' ? 'selected' : '' }}>Temari</option>
                                <option value="Praça principal" {{ $user->subsetor2 === 'Praça principal' ? 'selected' : '' }}>Praça principal</option>
                                <option value="Oriuno" {{ $user->subsetor2 === 'Oriuno' ? 'selected' : '' }}>Oriuno</option>
                                <option value="E-Temari" {{ $user->subsetor2 === 'E-Temari' ? 'selected' : '' }}>E-Temari</option>
                                <option value="Bonsai" {{ $user->subsetor2 === 'Bonsai' ? 'selected' : '' }}>Bonsai</option>
                                <option value="Oshibana" {{ $user->subsetor2 === 'Oshibana' ? 'selected' : '' }}>Oshibana</option>
                                <option value="Secretaria" {{ $user->subsetor2 === 'Secretaria' ? 'selected' : '' }}>Secretaria</option>
                                <option value="Altar Budista" {{ $user->subsetor2 === 'Altar Budista' ? 'selected' : '' }}>Altar Budista</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputPassword" class="col-form-label">Senha</label>
                            </div>
                            <div class="col-auto">
                                <input type="password" name="password" id="inputPassword6" class="form-control"
                                    aria-labelledby="passwordHelpInline">
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
