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
        
        //$name = auth()->user()->name ?? auth()->user()->email;
        $user = DB::table('users')->find($id);
        return view('tabelas.pagamentofiV', compact('user'));

    }
    public function pagamentoUpdate()
    {
        User::updateOrCreate(
            [
                'user_id' => $user_id,
                'name' => $name,
                'subsetor' => $subsetor,
                'data_registro' => Carbon::today(),
            ],
            ['saida' => Carbon::now()]
        );
    }
    
    
    public function registrarSaida(Request $request)
    {
    }
}
