<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;

class DadosImport implements ToModel, WithHeadingRow
{
    private static $lineNumber = 0;

    public function model(array $row)
    {
        // Incrementa o número da linha
        self::$lineNumber++;

        // Verifica se a linha atual é a 184 e para a execução
        if (self::$lineNumber >= 184) {
            return; // Para a execução na linha 184
        }

        // Verifica se o nome é "00000" e para a execução
        if (empty($row['nome']) || $row['nome'] === '00000') {
            return;
        }

        $nome = $row['nome'] ?? 'Nome Padrão';

        // Garante que o email não seja duplicado
        $email = $row['email'] ?? strtolower(str_replace(' ', '', $nome)) . '@gmail.com';

        // Verifica se o email já existe
        if (User::where('email', $email)->exists()) {
            return; // Evita inserir duplicados
        }

        // Criação ou atualização do usuário
        $usuario = User::where('email', $email)->first();
        if (!$usuario) {
            $days = [];
            $telefone = $row['telefone'] ?? "Sem Telefone";
            $usuario = new User([
                'name' => $nome,
                'email' => $email,
                'role' => $row['role'] ?? "user",
                'setor1' => $row['local'],
                'on' => $row['on'] ?? "on",
                'telefone' => $telefone,
                'password' => bcrypt($nome),
            ]);
            $usuario->save();
        } else {
            $setor1 = $row['Local'];
            $usuario->setor1 = $setor1;
            $usuario->save();
        }
    }
}