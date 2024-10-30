<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RpiMaquina;
use App\Models\RpiMaquinaDado;
use Illuminate\Support\Facades\Validator;

class MaquinaController extends Controller
{
    public function storeDado(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "maquina_id" => 'required|integer|',
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
}
