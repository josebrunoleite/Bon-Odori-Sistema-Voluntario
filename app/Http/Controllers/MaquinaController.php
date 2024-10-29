<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RpiMaquina;
use App\Models\RpiMaquinaDado;
use Illuminate\Support\Facades\Validator;

class MaquinaController extends Controller
{
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'localizacao' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $maquina = RpiMaquina::create([
            'nome' => $request->nome,
            'localizacao' => $request->localizacao,
        ]);

        return response()->json(['message' => 'Maquina cadastrada com sucesso!', 'data' => $maquina], 201);
    }


    public function storeDado(Request $request, $maquina_id)
    {
        $validator = Validator::make($request->all(), [
            'temperatura' => 'required|numeric',
            'umidade' => 'required|numeric',
            'ruido' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $maquina = RpiMaquina::find($maquina_id);
        if (!$maquina) {
            return response()->json(['message' => 'Máquina não encontrada'], 404);
        }

        $dado = RpiMaquinaDado::create([
            'maquina_id' => $maquina_id,
            'timestamp' => $request->timestamp,
            'temperatura' => $request->temperatura,
            'umidade' => $request->umidade,
            'ruido' => $request->ruido,
        ]);

        return response()->json(['message' => 'Dado registrado com sucesso!', 'data' => $dado], 201);
    }

    // Listar todas as máquinas com seus dados
    public function index()
    {
        $maquinas = RpiMaquina::with('rpiMaquinaDado')->get();

        return response()->json(['data' => $maquinas], 200);
    }
}
