<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Presenca;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Exception;


class PresencaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user_id = auth()->id();
        $name = auth()->user()->name ?? auth()->user()->email;

        $presenca = Presenca::where('user_id', $user_id)
            ->whereDate('data_registro', Carbon::today())
            ->first();

        $presente = $presenca && $presenca->entrada && !$presenca->saida;
        $horarioEntrada = $presenca ? $presenca->entrada : null;

        return view('presenca.pontoflex', compact('presente', 'horarioEntrada'));
    }

    public function tabela()
    {
        $dataAtual = Carbon::now();
        $dataOntem = Carbon::yesterday();
        $users = Presenca::all();
        $usersdata = User::all()->count();
        $usuariosSemSaida = Presenca::whereDate('entrada', $dataAtual)
            ->whereNull('saida');

        $usuariosComSaida = Presenca::whereDate('entrada', $dataAtual)
            ->whereNotNull('saida');

        $registrosSaidaOntem = Presenca::whereDate('entrada', $dataOntem)
            ->whereNull('saida')
            ->get();

        return view('presenca.presencaTable', compact('users', 'usuariosSemSaida', 'usuariosComSaida', 'registrosSaidaOntem', 'usersdata'))
            ->with('success', 'Não abra pelo celular!.');
    }
    public function atualizarCheckout(Request $request, Presenca $presenca)
    {
        $id = $request->route('id');

        $presenca->where('id', $id)
            ->update(['saida' => Carbon::now()]);

        return Redirect::back()->with('success', 'Saída registrada com sucesso.');
    }


    public function atualizarManual($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
        $ADM = auth()->user();
        $codeADM = $ADM->name;
        $user_id = $usuario->id;
        $name = $usuario->name ?? $usuario->email;
        $subsetor1 = $usuario->setor1 ?? 'Error';
        $subsetor2 = $usuario->setor2  ?? 'Error';

        try {
            Presenca::updateOrCreate(
                [
                    'user_id' => $user_id,
                    'name' => $name,
                    'subsetor1' => $subsetor1,
                    'subsetor2' => $subsetor2,
                    'codigoInserido' => 'adm_' . $codeADM,
                    'data_registro' => Carbon::today(),
                ],
                ['entrada' => Carbon::now()]
            );

            return redirect::back()->with('success', 'Entrada registrada com sucesso.');
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }
}
