<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Presenca;
use DB;
use GuzzleHttp\Promise\Create;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


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
    public function registrarEntrada(Request $request)
    {
        $user_id = auth()->id();
        $name = auth()->user()->name ?? $name = auth()->user()->email;
        $subsetor01 = auth()->user()->subsetor1;
        $subsetor02 = auth()->user()->subsetor2;

        $codigoInserido = $request->input('codiEnter');

        $entrada = Presenca::where('user_id', $user_id)
            ->whereDate('data_registro', Carbon::today())
            ->first();

        if ($entrada && $entrada->entrada !== null) {
            // Usuário já registrou a entrada hoje
            $presente = true;
            return Redirect::back()->with('error', 'Você já registrou a entrada hoje.');
        }

        if (!$this->codigoValido($codigoInserido)) {
            return Redirect::back()->with('error', 'Código inválido. A presença não foi registrada.');
        }

        // Registrar a entrada
        Presenca::updateOrCreate(
            [
                'user_id' => $user_id,
                'name' => $name,
                'subsetor1' => $subsetor01,
                'subsetor2' => $subsetor02,
                'codigoInserido' => $codigoInserido,
                'data_registro' => Carbon::today(),
            ],
            ['entrada' => Carbon::now()]
        );

        $presente = true;
        return Redirect::back()->with('success', 'Entrada registrada com sucesso.');
    }


    public function registrarSaida(Request $request)
    {
        $user_id = auth()->id();
        $name = auth()->user()->name ?? $name = auth()->user()->email;
        $subsetor01 = auth()->user()->subsetor1;
        $subsetor02 = auth()->user()->subsetor2;

        // Verificar se a entrada foi registrada hoje
        $entrada = Presenca::where('user_id', $user_id)
            ->whereDate('data_registro', Carbon::today())
            ->whereNotNull('entrada')
            ->first();

        if (!$entrada) {
            // Usuário não registrou a entrada hoje
            $presente = false;
            return Redirect::back()->with('error', 'Você precisa registrar a entrada antes de registrar a saída.');
        }

        // Verificar se já foi registrada a saída hoje
        $saida = Presenca::where('user_id', $user_id)
            ->whereDate('data_registro', Carbon::today())
            ->whereNotNull('saida')
            ->first();

        if ($saida) {
            // Usuário já registrou a saída hoje
            $presente = true;
            return view('presenca.pontoflex', compact('presente'))->with('error', 'Você já registrou a saída hoje.');
        }

        // Registrar a saída
        Presenca::updateOrCreate(
            [
                'user_id' => $user_id,
                'name' => $name,
                'subsetor1' => $subsetor01,
                'subsetor2' => $subsetor02,
                'data_registro' => Carbon::today(),
            ],
            ['saida' => Carbon::now()]
        );

        $presente = false;
        return Redirect::back()->with('success', 'Saída registrada com sucesso.');
    }

    private function codigoValido($codigo)
    {
        $jsonFilePath = storage_path('app/codigos_presenca.json');

        if (!file_exists($jsonFilePath)) {
            echo 'Pop';
            return false; // Arquivo não encontrado, código inválido
        }

        $jsonFile = file_get_contents($jsonFilePath);
        $codigos = json_decode($jsonFile, true);

        foreach ($codigos['codigos'] as &$cod) {
            if ($cod['codigo'] === $codigo && $cod['status'] === 'valido') {
                $cod['status'] = 'invalido'; // Marcar o código como inválido após uso
                $jsonContent = json_encode($codigos, JSON_PRETTY_PRINT);
                file_put_contents($jsonFilePath, $jsonContent);
                return true; // Código válido
            }
        }

        return false; // Código inválido
    }
    public function registrarEntradaQrCode(Request $request)
    {
        $user_id = auth()->id();
        $name = auth()->user()->name ?? $name = auth()->user()->email;
        $subsetor01 = auth()->user()->subsetor1;
        $subsetor02 = auth()->user()->subsetor2;

        $codigoInserido = $request->input('qrcode');

        $entrada = Presenca::where('user_id', $user_id)
            ->whereDate('data_registro', Carbon::today())
            ->first();

        if ($entrada && $entrada->entrada !== null) {
            // Usuário já registrou a entrada hoje
            $presente = true;
            return view('presenca.pontoflex', compact('presente')->with('error', 'Você já registrou a entrada hoje.');
        }

        if (!$this->codigoValido($codigoInserido)) {
            return view('presenca.pontoflex')->with('error', 'Código inválido. A presença não foi registrada.');
        }

        // Registrar a entrada
        Presenca::updateOrCreate(
            [
                'user_id' => $user_id,
                'name' => $name,
                'subsetor1' => $subsetor01,
                'subsetor2' => $subsetor02,
                'codigoInserido' => $codigoInserido,
                'data_registro' => Carbon::today(),
            ],
            ['entrada' => Carbon::now()]
        );

        $presente = true;
        return view('presenca.pontoflex', compact('presente')->with('success', 'Entrada registrada com sucesso.');
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
        
        //Filtro 1
        
        //$registrosSaidaOntem = Presenca::whereDate('saida', $dataOntem)->get();
        //FIltro 2
        $registrosSaidaOntem = Presenca::whereDate('entrada', $dataOntem)
                               ->whereNull('saida')
                               ->get();
    
        return view('presenca.presencaTable', compact('users', 'usuariosSemSaida', 'usuariosComSaida', 'registrosSaidaOntem', 'usersdata'))
               ->with('success', 'Não abra pelo celular!.');
        }
    public function waringpres($id)
{
    Presenca::where('id', $id)
        ->update(['saida' => '2000-01-01 03:00:00']);
       
        return Redirect::back()->with('success', 'Advertencia Administrada.');

}
}
