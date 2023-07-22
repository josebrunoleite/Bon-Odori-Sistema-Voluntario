@extends('adminlte::page')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pagina de Alteração de Vonluntario!</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Nome</label>
                            <input type="password" class="form-control" id="inputName" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Cargo</label><select class="custom-select">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
                                <option value="mod" {{ $user->role === 'mod' ? 'selected' : '' }}>mod</option>
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Setor</label><select class="custom-select">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
                                <option value="mod" {{ $user->role === 'mod' ? 'selected' : '' }}>mod</option>
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>SubSetor</label><select class="custom-select">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
                                <option value="mod" {{ $user->role === 'mod' ? 'selected' : '' }}>mod</option>
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputPassword" class="col-form-label">Senha</label>
                            </div>
                            <div class="col-auto">
                                <input type="password" id="inputPassword6" class="form-control"
                                    aria-labelledby="passwordHelpInline">
                            </div>
                            <div class="col-auto">
                                <span id="passwordHelpInline" class="form-text">
                                    Must be 8-20 characters long.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
@endsection
