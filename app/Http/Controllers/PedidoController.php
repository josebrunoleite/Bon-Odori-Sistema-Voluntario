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
    public function compileLexarForC(Request $request)
    {
        try {
            // Validate file upload
            $request->validate([
                'code' => 'required|file|mimes:txt,c,h|max:2048',
            ]);
    
            $file = $request->file('code');
            $code = file_get_contents($file->getRealPath());

            // Expanded token definitions
            $tokens = [];
            $keywords = ['int', 'float', 'char', 'double', 'void', 'return', 'if', 'else', 'while', 
                        'for', 'do', 'break', 'continue', 'switch', 'case', 'default', 'struct'];
            $operators = ['+', '-', '*', '/', '%', '=', '==', '!=', '<', '>', '<=', '>=', '&&', '||', 
                         '!', '++', '--', '+=', '-=', '*=', '/=', '&', '|', '^', '<<', '>>'];
            $delimiters = ['(', ')', '{', '}', '[', ']', ';', ',', '.', ':'];

            // Remove comments
            $code = preg_replace('!/\*.*?\*/!s', '', $code); // Remove multi-line comments
            $code = preg_replace('!//.*!', '', $code);       // Remove single-line comments

            // Tokenize
            $pattern = '/([a-zA-Z_]\w*)|([0-9]*\.?[0-9]+)|(".*?")|(\'.\')|(==|!=|<=|>=|\|\||&&|[+\-*\/%=<>!&|^])|([,;(){}[\]])|\s+/';
            preg_match_all($pattern, $code, $matches);

            foreach ($matches[0] as $token) {
                $token = trim($token);
                if (empty($token)) continue;

                if (in_array($token, $keywords)) {
                    $tokens[] = ['type' => 'keyword', 'value' => $token];
                } elseif (preg_match('/^[0-9]*\.?[0-9]+$/', $token)) {
                    $tokens[] = ['type' => 'number', 'value' => $token];
                } elseif (preg_match('/^".*"$/', $token)) {
                    $tokens[] = ['type' => 'string', 'value' => $token];
                } elseif (preg_match('/^\'.*\'$/', $token)) {
                    $tokens[] = ['type' => 'char', 'value' => $token];
                } elseif (in_array($token, $operators)) {
                    $tokens[] = ['type' => 'operator', 'value' => $token];
                } elseif (in_array($token, $delimiters)) {
                    $tokens[] = ['type' => 'delimiter', 'value' => $token];
                } elseif (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $token)) {
                    $tokens[] = ['type' => 'identifier', 'value' => $token];
                }
            }

            return redirect('/lexar')->with('tokens', $tokens);
        } catch (\Exception $e) {
            return redirect('/lexar')->with('error', $e->getMessage());
        }
    }
}
