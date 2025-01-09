<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CodeController extends Controller
{
    public function index()
    {
        return view('code.index');
    }

    public function generateCode(Request $request)
    {
        $currentDateTime = Carbon::now();
        $startDateTime = Carbon::parse('2025-01-11 09:00:00');
        $endDateTime = Carbon::parse('2025-01-11 16:00:00');

        if ($currentDateTime->lessThan($startDateTime)) {
            $remainingTime = $currentDateTime->diffForHumans($startDateTime, [
            'parts' => 3,
            'short' => true,
            'syntax' => Carbon::DIFF_ABSOLUTE,
            ]);
            return redirect()->route('vote.index')->with('error', 'A votação começará em ' . $remainingTime);
        } elseif ($currentDateTime->greaterThan($endDateTime)) {
            return redirect()->route('vote.index')->with('error', 'A votação já terminou.');
        }
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
            return back()->with('success', $codigoValido);
        } else {
            return back()->with('error', 'Nenhum código válido disponível!');
        }
    }
}