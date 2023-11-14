@extends('adminlte::page')
@section('content')
    @php
        use Carbon\Carbon;
        $dataRegistro = Carbon::now('America/Bahia');
        $dataRegistro->format('Y-m-d H:i');
    @endphp

    <body class="d-flex h-100 text-center text-bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 ">
                    <div class="card p-3 text-center">
                        <div class="card-header">Olá voluntário!</div>
                        <h2>Obrigado por participar do Bon Odori como voluntario, aqui está algumas informações para
                            você</h2>
                        <h3>Algumas informações para você {{ $user->name }}</h3>
                        {{--                     <h3>Seu setor será de manhã é {{ $user->setor1 ?? 'Ops você você não possui info' }} e seu subsetor
                        será {{ $user->subsetor1 ?? 'Ops você você não possui info' }} </h3>
                    <h3>Seu setor será de tarde é {{ $user->setor2 ?? 'Ops você você não possui info' }} e seu subsetor
                        será {{ $user->subsetor2 ?? 'Ops você você não possui info' }} </h3> --}}
                        @if (strpos($user->setor1, '-') !== false)
                            Você não está cadastrado no horário da manhã.
                        @else
                            <h4>Seu setor pela manhã é {{ $user->setor1 ?? 'Ops você você não possui info' }}. Seu subsetor será {{ $user->subsetor1 ?? 'Ops você você não possui info' }} </h4>
                        @endif
                        @if (strpos($user->setor2, '-') !== false)
                            Você não está cadastrado no horário da noite.
                        @else
                        <h4>Seu setor pela noite é {{ $user->setor2 ?? 'Ops você você não possui info' }}. Seu subsetor será {{ $user->subsetor2 ?? 'Ops você você não possui info' }} </h4>

                        @endif
                        <h3>Parabéns! Você está designado para os seguintes dias:</h3>
                        <div>
                            {{-- <h3>Ainda não Atualizado</h3> --}}
                           @if (in_array('sexta', $checkboxData))
                                <h4>Sexta</h4>
                            @endif
                            @if (in_array('sabado', $checkboxData))
                                <h4>Sabado</h4>
                            @endif
                            @if (in_array('domingo', $checkboxData))
                                <h4>Domingo</h4>
                            @endif
                        </div>
                        <h5>Ultima atualização sua {{ $user->updated_at }}</h5>
                        {{-- <div>
                            <h5>Ultima atualização sua {{ $user->updated_at }}</h5>
                            <br>
                            <h3 class="text-bold">Aonde usar o ticket</h3>
                            <h4 class="text-danger"> Nós teremos o nosso próprio restaurante! O almoço e/ou o
                                jantar será disponibilizado aos voluntários apenas neste restaurante, mediante apresentação
                                do ticket! O ticket não dá acesso aos demais restaurantes do evento.</h4>
                            <h3 class="text-bold">Sobre a entrada e crachá</h3>
                            <h4 class="text-danger">Todos ganham crachá, entra mostrando documento de
                                identificação com foto. Não pode perder o crachá de jeito nenhum !<br>
                                - Só pode entrar no dia que se voluntariar.
                            </h4>
                            <br>
                            <h3 class="text-bold">É Bon Odori</h3>
                            <h4 class="text-danger">Vamos relaxar e nos divertir no evento que gostamos</h4>
                        </div> --}}
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed text-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Aonde usar o ticket
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                Nós teremos o nosso próprio restaurante! O almoço e/ou o jantar será disponibilizado aos voluntários apenas neste restaurante, mediante apresentação
                                do ticket! O ticket não dá acesso aos demais restaurantes do evento.
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed text-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Sobre a entrada e crachá
                                </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                Todos ganham crachá, entra mostrando documento de identificação com foto. Não pode perder o crachá de jeito nenhum !<br>- Só pode entrar no dia que se voluntariar.
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed text-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                É Bon Odori
                                </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                Vamos relaxar e nos divertir no evento que gostamos!
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                  <button class="accordion-button collapsed text-bold text-danger text-bold text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    Tem dúvidas sobre o seu horário? Acesse a planilha.
                                  </button>
                                </h2>
                                <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                                  <div class="accordion-body">
                                  <a href="https://docs.google.com/spreadsheets/d/1xuck4PjnDUFcRmQPdbBPjUWzfUFphddEhLRRSuK4Qv4/edit?usp=sharing" target="_blank" rel="noopener noreferrer"> Planilha </a>
                                  </div>
                                </div>
                              </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
@stop