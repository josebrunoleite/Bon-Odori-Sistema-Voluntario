<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voluntarios</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <style>
        body img {
            /* background-image: url({{ asset('images/bonodori.jpg') }});*/
            height: 100%;
            width: 100%;
            object-fit: cover;
            z-index: -1;
            overflow-y: auto
        }
    </style>
</head>
<body class="d-flex h-100 text-center text-bg-dark">
    <img src="{{ asset('images/bonodori/001.jpg') }}">
    <img src="{{ asset('images/bonodori/002.jpg') }}">
    <img src="{{ asset('images/bonodori/003.jpg') }}">
    <!--<footer class="mt-auto px-auto text-white-50">
        <p class="text-white m-auto">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})<br>Um Site Seinenkai</p>
    </footer>-->
</body>


</html>
