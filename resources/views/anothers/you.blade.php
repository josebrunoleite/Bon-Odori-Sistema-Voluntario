@extends('adminlte::page')
@section('content')
<body class="d-flex h-100 text-center text-bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card p-3 text-center">
                    <div class="card-header">Olá voluntário!</div>
                    <h1>Obrigado por participar do Bon Odori esse como voluntario, aqui está algumas informações para
                        você</h1>
                    <h3>Olá, {{ $user->name }}</h3>
                    {{--                     <h3>Seu setor será de manhã é {{ $user->setor1 ?? 'Ops você você não possui info' }} e seu subsetor
                        será {{ $user->subsetor1 ?? 'Ops você você não possui info' }} </h3>
                    <h3>Seu setor será de tarde é {{ $user->setor2 ?? 'Ops você você não possui info' }} e seu subsetor
                        será {{ $user->subsetor2 ?? 'Ops você você não possui info' }} </h3> --}}
                    @if (strpos($user->setor1, '-') !== false)
                        Você não está cadastrado no horário da manhã.
                    @else
                        <h3>Seu setor será de manhã é {{ $user->setor1 ?? 'Ops você você não possui info' }} e seu
                            subsetor será {{ $user->subsetor1 ?? 'Ops você você não possui info' }} </h3>
                    @endif
                    @if (strpos($user->setor2, '-') !== false)
                        Você não está cadastrado no horário da noite.
                    @else
                        <h3>Seu setor será de noite é {{ $user->setor2 ?? 'Ops você você não possui info' }} e seu
                            subsetor será {{ $user->subsetor2 ?? 'Ops você você não possui info' }} </h3>
                    @endif
                    <h5>Ultima atualização sua {{$user->updated_at}}</h5>
                    <div class="card-body">
                        {{-- @dd($user) --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
