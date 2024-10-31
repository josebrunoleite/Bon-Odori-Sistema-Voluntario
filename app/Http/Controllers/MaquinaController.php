<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RpiMaquina;
use App\Models\RpiMaquinaDado;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class MaquinaController extends Controller
{
    public function storeDado(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "maquina_id" => 'required|string', 
            'temperatura' => 'required|numeric',
            'umidade' => 'required|numeric',
            'ruido' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $maquina = RpiMaquina::find($request->maquina_id);

        if (!$maquina) {
            $maquina = RpiMaquina::create([
                'id' => $request->maquina_id,
                'nome' => 'Maquina ' . $request->maquina_id,
                'localizacao' => 'Local ' . $request->maquina_id,
            ]);
            return response()->json(['message' => 'Maquina criada com sucesso!', 'data' => $maquina], 201);
        }

        $dado = RpiMaquinaDado::create([
            'maquina_id' => $request->maquina_id,
            'timestamp' => $request->timestamp,
            'temperatura' => $request->temperatura,
            'umidade' => $request->umidade,
            'ruido' => $request->ruido,
        ]);
    
        return response()->json(['message' => 'Dado registrado com sucesso!', 'data' => $dado], 201);
    }
    

    public function indexMaquinas()
    {
        $maquinas = RpiMaquina::with('rpiMaquinaDado')->get();

        return response()->json(['data' => $maquinas], 200);
    }


    public function indexMaquinasDados($maquina_id)
    {
        $maquina = RpiMaquina::find($maquina_id);

        if (!$maquina) {
            return response()->json(['message' => 'Maquina nao encontrada'], 404);
        }

        $dados = RpiMaquinaDado::where('maquina_id', $maquina_id)->get();

        return response()->json(['data' => $dados], 200);
    }

    public function tabela()
    {
        $maquinasTotal = RpiMaquina::first();
        $maquinasLimit = RpiMaquina::take(1)->first();

        $maquinasLimit2 = RpiMaquina::with(['rpiMaquinaDado' => function($query) {
            $query->orderBy('created_at');
        }])->first();

        $maquinasdata = [
            'maquina_id' => $maquinasLimit2->id,
            'created_at' => [],
            'temperatura' => [],
            'umidade' => [],
            'ruido' => [],
        ];

        if ($maquinasLimit2 && $maquinasLimit2->rpiMaquinaDado) {
            foreach ($maquinasLimit2->rpiMaquinaDado as $dado) {
                $maquinasdata['created_at'][] = Carbon::parse($dado->created_at)->format('Y-m-d');
                $maquinasdata['temperatura'][] = $dado->temperatura;
                $maquinasdata['umidade'][] = $dado->umidade;
                $maquinasdata['ruido'][] = $dado->ruido;
            }
        }
        return view('presenca.RPiTable', compact('maquinasTotal', 'maquinasdata', 'maquinasLimit', 'maquinasdata'));
    }


}
