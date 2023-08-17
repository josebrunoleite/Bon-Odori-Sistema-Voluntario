@extends('adminlte::page')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pagina de Criação de Voluntário!</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
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
            <div class="container-fluid">
                <form method="POST" action="{{ route('voluntario.store') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <!--Nome-->
                        <div class="form-group col-md-6">
                            <label for="inputName">Nome</label>
                            <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
                        </div>
                        <!--Email-->
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email"class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <!--Cargo-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Cargo</label>
                            <select class="custom-select" name="role" id="role">
                                <option value="user">user</option>
                                <option value="mod">mod</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>
                        <!--Fuso Horario-->
                        <div class="form-group col-md-4">
                            <label>Fuso Horario</label>
                            <select class="custom-select" name="on" id="on">
                                <option value="M">Manhã</option>
                                <option value="N">Noturno</option>
                                <option value="D">Dobrar</option>
                            </select>
                        </div>
                        <!--Setor01-->
                        <div class="form-group col-md-4">
                            <label>Setor</label>
                            <select class="custom-select" name="setor1" id="setor1">
                                <option value="Geral">Geral</option>
                                <option value="Federação">Federação</option>
                                <option value="Cultural">Cultural</option>
                                <option value="Alimentação">Alimentação</option>
                                <option value="Conteúdo, Shows e Outros">Conteúdo, Shows e Outros</option>
                                <option value="Oficinas de Culinária">Oficinas de Culinária</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Espaço Pop">Espaço Pop</option>
                                <option value="Comercial">Comercial</option>
                            </select>
                        </div>
                        <!--SubSetor01-->
                        <div class="form-group col-md-4">
                            <label>SubSetor</label>
                            <select class="custom-select" name="subsetor1" id="subsetor1">
                                <option value="Subsetor">Subsetor</option>
                                <option value="Mochila">Mochila</option>
                                <option value="Comercial">Comercial</option>
                                <option value="Kirigami">Kirigami</option>
                                <option value="Praça Anime">Praça Anime</option>
                                <option value="Palco Haru">Palco Haru</option>
                                <option value="Sustentabilidade">Sustentabilidade</option>
                                <option value="Sumiê">Sumiê</option>
                                <option value="Chá">Chá</option>
                                <option value="EXPOSIÇÃO">EXPOSIÇÃO</option>
                                <option value="Tabuleiro">Tabuleiro</option>
                                <option value="Balcão">Balcão</option>
                                <option value="Acessibilidade">Acessibilidade</option>
                                <option value="Institucional">Institucional</option>
                                <option value="Origami">Origami</option>
                                <option value="Palco Natsu">Palco Natsu</option>
                                <option value="Japan House">Japan House</option>
                                <option value="Fundação Japão">Fundação Japão</option>
                                <option value="Escola de Língua Japonesa">Escola de Língua Japonesa</option>
                                <option value="Imprensa">Imprensa</option>
                                <option value="Espaço Bon Odori">Espaço Bon Odori</option>
                                <option value="Stand">Stand</option>
                                <option value="Temari">Temari</option>
                                <option value="Praça principal">Praça principal</option>
                                <option value="Oriuno">Oriuno</option>
                                <option value="E-Temari">E-Temari</option>
                                <option value="Bonsai">Bonsai</option>
                                <option value="Oshibana">Oshibana</option>
                                <option value="Secretaria">Secretaria</option>
                                <option value="Altar Budista">Altar Budista</option>
                            </select>
                        </div>
                        <!--Setor02-->
                        <div class="form-group col-md-4">
                            <label>Setor 2</label>
                            <select class="custom-select" name="setor2" id="setor2">
                                <option value="Geral">Geral</option>
                                <option value="Federação">Federação</option>
                                <option value="Cultural">Cultural</option>
                                <option value="Alimentação">Alimentação</option>
                                <option value="Conteúdo, Shows e Outros">Conteúdo, Shows e Outros</option>
                                <option value="Oficinas de Culinária">Oficinas de Culinária</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Espaço Pop">Espaço Pop</option>
                                <option value="Comercial">Comercial</option>
                            </select>
                        </div>
                        <!--SubSetor02-->
                        <div class="form-group col-md-4">
                            <label>SubSetor</label>
                            <select class="custom-select" name="subsetor2" id="subsetor2">
                                <option value="Subsetor">Subsetor</option>
                                <option value="Mochila">Mochila</option>
                                <option value="COMERCIAL">COMERCIAL</option>
                                <option value="Kirigami">Kirigami</option>
                                <option value="Praça Anime">Praça Anime</option>
                                <option value="Palco Haru">Palco Haru</option>
                                <option value="Sustentabilidade">Sustentabilidade</option>
                                <option value="Sumiê">Sumiê</option>
                                <option value="Chá">Chá</option>
                                <option value="EXPOSIÇÃO">EXPOSIÇÃO</option>
                                <option value="Tabuleiro">Tabuleiro</option>
                                <option value="Balcão">Balcão</option>
                                <option value="Acessibilidade">Acessibilidade</option>
                                <option value="Institucional">Institucional</option>
                                <option value="Origami">Origami</option>
                                <option value="Palco Natsu">Palco Natsu</option>
                                <option value="Japan House">Japan House</option>
                                <option value="Fundação Japão">Fundação Japão</option>
                                <option value="Escola de Língua Japonesa">Escola de Língua Japonesa</option>
                                <option value="Imprensa">Imprensa</option>
                                <option value="Espaço Bon Odori">Espaço Bon Odori</option>
                                <option value="Stand">Stand</option>
                                <option value="Temari">Temari</option>
                                <option value="Praça principal">Praça principal</option>
                                <option value="Oriuno">Oriuno</option>
                                <option value="E-Temari">E-Temari</option>
                                <option value="Bonsai">Bonsai</option>
                                <option value="Oshibana">Oshibana</option>
                                <option value="Secretaria">Secretaria</option>
                                <option value="Altar Budista">Altar Budista</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Sexta</label>
                            <input type="checkbox" name="checkbox_data[]" value="sexta">
                            <label>Sabado</label>
                            <input type="checkbox" name="checkbox_data[]" value="sabado">
                            <label>Domingo</label>
                            <input type="checkbox" name="checkbox_data[]" value="domingo">
                            <label>Ausente</label>
                            <input type="checkbox" name="checkbox_data[]" value="ausente">
                        </div>
                    </div>
                    <div class="form-row">

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
                    {{--                           <div class="col-auto">
                                <span id="passwordHelpInline" class="form-text">
                                    Must be 8-20 characters long.
                                </span>
                            </div> --}}
                </div>
            </div>
            {{--                     <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div> --}}
            <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </div>
@endsection
