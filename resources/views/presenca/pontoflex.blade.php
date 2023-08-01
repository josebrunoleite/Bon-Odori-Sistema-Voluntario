@extends('adminlte::page')
@section('content')
<img id="randomImage" class="" src="" alt="">
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
                        <br>
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
    const imageUrls = [
        'https://media.tenor.com/QONGo5d2GdIAAAAd/hatsune-miku-miku-hatsune.gif',
        'https://media.tenor.com/4mGl-qVGALAAAAAd/miku-anime.gif',
        'https://media.tenor.com/bm-En8JMt9kAAAAC/makoto-daily-hatsune-miku.gif',
        'https://media.tenor.com/D5nQKXfnSP0AAAAd/miku-hatsune-miku.gif',
        'https://media.tenor.com/RYI4doDdHNwAAAAC/hatsune-miku.gif',
        //ss
    ];

    function getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function changeRandomImageSrc() {
        const randomIndex = getRandomNumber(0, imageUrls.length - 1);
        const randomImageUrl = imageUrls[randomIndex];
        const imgElement = document.getElementById('randomImage');
        imgElement.src = randomImageUrl;
    }

    window.addEventListener('load', changeRandomImageSrc);
    
</script>

<style>
    img{
        position: absolute;
        background-color: black;
        width: 250px;
        height: auto;
        z-index: 1;
        top: 50px;
        left: 50px;
    }
    .card{
        position: relative;
        z-index: 0;
    }
</style>
