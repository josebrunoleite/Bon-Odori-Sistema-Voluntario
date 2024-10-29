<?php

namespace App\Http\Controllers;

use App\Models\RpiMaquina;
use App\Models\RpiMaquinaDado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RpiMaquinaController extends Controller
{
    // Cadastro de uma nova máquina
    public function storeMaquina(Request $request)
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

        return response()->json(['message' => 'Máquina cadastrada com sucesso!', 'data' => $maquina], 201);
    }

    // Cadastro de um novo dado para uma máquina específica
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
            'temperatura' => $request->temperatura,
            'umidade' => $request->umidade,
            'ruido' => $request->ruido,
            'timestamp' => $request->timestamp,
        ]);

        return response()->json(['message' => 'Dado registrado com sucesso!', 'data' => $dado], 201);
    }
}
