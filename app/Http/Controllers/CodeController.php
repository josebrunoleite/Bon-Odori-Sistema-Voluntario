<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CodeController extends Controller
{
    public function index()
    {
        return view('code.index');
    }

    public function generateCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;
        $data = json_decode(Storage::get('codigos_presenca.json'), true);

        // Verificar se o email já existe nos registros
        foreach ($data['codigos'] as $codigo) {
            if (isset($codigo['email']) && $codigo['email'] == $email) {
                return back()->with('error', 'Email já registrado!');
            }
        }

        // Pegar um código válido
        $codigoValido = null;
        foreach ($data['codigos'] as &$codigo) {
            if (!isset($codigo['email']) && $codigo['status'] == 'valido') {
                $codigoValido = $codigo['codigo'];
                $codigo['email'] = $email;
                break;
            }
        }

        if ($codigoValido) {
            Storage::put('codigos_presenca.json', json_encode($data));
            return back()->with('success', 'Seu código é: ' . $codigoValido);
        } else {
            return back()->with('error', 'Nenhum código válido disponível!');
        }
    }
}