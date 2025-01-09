@extends('adminlte::page')
@section('content')
    <!-- Main content -->
    <div class=".container-xxl	">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Pagina do Compilador!</h1>
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
                        <form action="{{ route('lexar.compile') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                            @csrf
                            {{-- <div class="mb-3">
                                <label for="inputType" class="form-label">Select Input Type:</label>
                                <select id="inputType" class="form-select" onchange="toggleInput()">
                                    <option value="text">Text</option>
                                    <option value="file">File</option>
                                </select>
                            </div>
                     --}}
                            {{-- <!-- Text Input -->
                            <div id="textInputGroup" class="mb-3">
                                <label for="codeText" class="form-label">Enter C Code:</label>
                                <textarea name="code_text" id="codeText" class="form-control" rows="6"></textarea>
                            </div> --}}
                    
                            <!-- File Input -->
                            <div id="fileInputGroup" class="mb-3">
                                <label for="code" class="form-label">Upload your C File:</label>
                                <input type="file" name="code" id="code" class="form-control" accept=".c,.h,.txt">
                            </div>
                            <button type="submit" class="btn btn-primary">Analyze</button>
                        </form>
                        @if (session('tokens'))
                            <div class="mt-5">
                                <h3>Resultado</h3>
                                <p><strong>Total Tokens:</strong> {{ count(session('tokens')) }}</p>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Valor</th>
                                            <th>Tabela Simbolo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (session('tokens') as $token)
                                            <tr>
                                                <td>{{ $token['type'] }}</td>
                                                <td>{{ $token['value'] }}</td>
                                                @if(isset($token['ID']))
                                                    <td>{{ $token['ID'] }}</td>
                                                @else
                                                    <td></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <hr>
                       
                        <div class="mt-5">
                            <h3>Resultado</h3>
                            <p><strong>Total de sibolos:</strong> {{ count(session('simbols')) }}</p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('tokens') as $simbol)
                                    <tr>
                                        @if(isset($simbol['ID']) && !isset($printedSimbols[$simbol['ID']]))
                                            <td>{{ $simbol['ID'] }}</td>
                                            <td>{{ $simbol['value'] }}</td>
                                            @php $printedSimbols[$simbol['ID']] = true; @endphp
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @elseif(session('errorLexar'))
                            <div class="alert alert-danger mt-5">
                                {{ session('error') }}
                            </div>
                        @endif
                        <!-- Table simbols -->

                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
@endsection
<script>
    function toggleInput() {
        const inputType = document.getElementById('inputType').value;
        const textInputGroup = document.getElementById('textInputGroup');
        const fileInputGroup = document.getElementById('fileInputGroup');

        if (inputType === 'text') {
            textInputGroup.classList.remove('d-none');
            fileInputGroup.classList.add('d-none');
        } else {
            textInputGroup.classList.add('d-none');
            fileInputGroup.classList.remove('d-none');
        }
    }
</script>