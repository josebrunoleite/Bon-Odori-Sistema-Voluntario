<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;

class DadosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $email = $row['email'];

        // Localize o usuário com base no email
        $usuario = User::where('email', $email)->first();

        if ($usuario) {
            // Se o usuário existir, atualize os campos desejados
            $setor1 = $row['setor1'];
            $subsetor1 = $row['subsetor1'];
            $setor2 = $row['setor2'];
            $subsetor2 = $row['subsetor2'];

            $usuario->setor1 = $setor1;
            $usuario->subsetor1 = $subsetor1;
            $usuario->setor2 = $setor2;
            $usuario->subsetor2 = $subsetor2;

            $usuario->save();
        } else {
            // Se o usuário não existir, crie um novo registro com os dados do Excel
            $usuario = new User([
                'name' => $row['nome'],
                'email' =>  $row['email'],
                'role' => $row['role'] ?? "user",
                'setor1' => $row['setor1'],
                'subsetor1' => $row['subsetor1'],
                'setor2' => $row['setor2'],
                'subsetor2' => $row['subsetor2'],
                'on' => $row['on'],
                'password' => bcrypt($row['telefone']), // Criptografa a senha com bcrypt()
            ]);

            $usuario->save();

        }
    }
}

