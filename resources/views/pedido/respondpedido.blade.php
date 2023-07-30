<!-- resources/views/listar_pedidos.blade.php -->
@extends('adminlte::page')

@section('content')
    <h1>Lista de Pedidos</h1>
    <ul>
        @foreach($pedidos as $pedido)
            <li>
                Tipo: {{ $pedido->tipo }}, Descrição: {{ $pedido->descricao }}
                @if ($pedido->resposta)
                    <br>
                    Resposta: {{ $pedido->resposta }}
                @else
                    <br>
                    <form action="{{ route('responder_pedido', ['id' => $pedido->id]) }}" method="POST">
                        @csrf
                        <label for="resposta">Resposta:</label>
                        <textarea name="resposta" id="resposta" cols="30" rows="3"></textarea>
                        <br>
                        <button type="submit">Enviar Resposta</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
