<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Promise\Create;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Reserva;
use App\Models\Presenca;

class PagamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $user = DB::table('users')->find($id);
        $checkboxData = json_decode($user->options ?? '[]', true);
        //@dd($checkboxData);

        $presenca = Presenca::where('user_id', $user->id)
        ->whereDate('data_registro', Carbon::today())
        ->first();

    $presente = $presenca && $presenca->entrada && !$presenca->saida;

        return view('tabelas.pagamentofiV', compact('user', 'checkboxData', 'presente'));
    }
    public function store(Request $request, $id)
    {
        try {
            $user = User::find($id); // Usar Eloquent para encontrar o usuário
            $checkboxData = $request->input('checkbox_data', []);

            Reserva::Create(
                [
                    'name' => $user->name,
                    'subsDay' => Carbon::today(),
                    'options' => json_encode($checkboxData),
                    'days' => json_encode([Carbon::now()]),
                ],
            );

            DB::table('users')
                ->where('id', $id)
                ->update(['options' => json_encode($checkboxData)]);

            return redirect()->back()->with('success', 'Dados do checkbox foram atualizados com sucesso e backup foi criado/atualizado!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar os dados do checkbox e criar/atualizar backup.');
        }
    }


    public function registrarSaida(Request $request) {}
}
