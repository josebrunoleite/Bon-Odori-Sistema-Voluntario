<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();

        return view('pedido.list', compact('pedidos'));
    }
    /*public function index2()
    {
        $pedidos = Pedido::all();

        return view('pedido.list', compact('pedidos'));
    }*/
    public function create()
    {
        return view('pedido.criar_pedido2');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomepedidoUS' => 'required|string',
            'pedido' => 'required|string',
            'descricao' => 'required|string',
        ]);

        Pedido::create($request->all());

        return redirect()->route('listar_pedidos')->with('success', 'Pedido criado com sucesso!');
    }
    public function responderPedido(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        $request->validate([
            'nomepedidoRE' => 'required|string',
            'resposta' => 'required|string',
        ]);

        $pedido->update([
            'resposta' => $request->resposta,
        ]);

        return redirect()->route('listar_pedidos')->with('success', 'Resposta enviada com sucesso!');
    }
}

