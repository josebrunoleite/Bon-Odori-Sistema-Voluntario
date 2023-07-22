@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrar Presença</div>

                    <div class="card-body">
                        @if ($presente == true)
                            <p>Você está presente!</p>
                            <form action="{{ route('presenca.saida') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Registrar Saída</button>
                            </form>
                        @elseif($presente == false)
                            <p>Você não está presente ou já registrou a saída.</p>
                            <form action="{{ route('presenca.entrada') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="codiEnter" class="form-label">Código de entrada:</label>
                                    <input type="password" name="codiEnter" id="codiEnter" class="form-control"
                                        aria-labelledby="passwordHelpInline">
                                    @error('codiEnter')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Registrar Entrada</button>
                            </form>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
<link href="{{ asset('vendor/toastr/toastr.min.css') }}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    // Seu script jQuery/JavaScript aqui
</script>
