@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Importar
            </div>
            <div class="card-body">
                <form action="{{ url('import_excelFu') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Importar</button>
                </form>
                <br>
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
        </div>
    </div>
@endsection
