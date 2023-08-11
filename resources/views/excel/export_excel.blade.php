@extends('adminlte::page')
@section('content')
    <img id="randomImage" class="" src="" alt="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Exporta</div>
                    <div class="card-body">
                        <div>
                            <a href="{{ route('exportTable') }}">
                                <button type="button" class="btn btn-primary btn-lg">Exporta Usuario</button>
                            </a>
                        </div>

                        <br>

                        <div>
                            <a href="{{ route('exportTablepresenca') }}">
                                <button type="button" class="btn btn-primary btn-lg">Exporta Presença</button>
                            </a>
                        </div>

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
    img {
        position: absolute;
        background-color: black;
        width: 250px;
        height: auto;
        z-index: 1;
        bottom: 10em;
        left: 50%;
    }

    .card {
        position: relative;
        z-index: 0;
    }
</style>
