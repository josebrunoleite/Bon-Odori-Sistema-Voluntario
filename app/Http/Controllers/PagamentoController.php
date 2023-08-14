<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Promise\Create;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

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
        return view('tabelas.pagamentofiV', compact('user', 'checkboxData'));
        
    }
    public function store(Request $request, $id)
    {
        try {
            $user = DB::table('users')->find($id);
    
            $checkboxData = $request->input('checkbox_data', []);
                DB::table('users')
                ->where('id', $id)
                ->update(['options' => json_encode($checkboxData)]);
                $user->options = json_encode($checkboxData);
    
            return redirect()->back()->with('success', 'Dados do checkbox foram atualizados com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar os dados do checkbox.');
        }
    }
    
    
    public function registrarSaida(Request $request)
    {
    }
}
