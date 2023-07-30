<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voluntarios sobre você</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex h-100 text-center text-bg-white">
    <!--<section class="hidden">
        <h1>Olá voluntário! Obrigado por participar do Bon Odori esse como voluntario, aqui está algumas informações para você</h1>
        <h3>Olá, {{$user->name}}</h3>
        <h3>Seu setor será de manhã é {{$user->setor1 ?? "Ops você você não possui info"}} e seu subsetor será {{$user->subsetor1 ?? "Ops você você não possui info"}} </h3>
        <h3>Seu setor será de tarde é {{$user->setor2 ?? "Ops você você não possui info"}} e seu subsetor será {{$user->subsetor2 ?? "Ops você você não possui info"}} </h3>
    </section>-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Olá voluntário!</div>
                    <h1>Obrigado por participar do Bon Odori esse como voluntario, aqui está algumas informações para você</h1>
                    <h3>Olá, {{$user->name}}</h3>
                    <h3>Seu setor será de manhã é {{$user->setor1 ?? "Ops você você não possui info"}} e seu subsetor será {{$user->subsetor1 ?? "Ops você você não possui info"}} </h3>
                    <h3>Seu setor será de tarde é {{$user->setor2 ?? "Ops você você não possui info"}} e seu subsetor será {{$user->subsetor2 ?? "Ops você você não possui info"}} </h3>
            
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
 </body>


</html>
