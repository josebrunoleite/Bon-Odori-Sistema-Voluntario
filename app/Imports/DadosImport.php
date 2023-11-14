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

        $usuario = User::where('email', $email)->first();

        if ($usuario) {
            $setor1 = $row['setor1'];
            $subsetor1 = $row['subsetor1'];
            $setor2 = $row['setor2'];
            $subsetor2 = $row['subsetor2'];

            $usuario->setor1 = $setor1;
            $usuario->subsetor1 = $subsetor1;
            $usuario->setor2 = $setor2;
            $usuario->subsetor2 = $subsetor2;

            /*$days = [];

            if (!empty($row['sexta'])) {
                $days[] = 'sexta';
            }
            if (!empty($row['sabado'])) {
                $days[] = 'sabado';
            }
            if (!empty($row['domingo'])) {
                $days[] = 'domingo';
            }

            $existingDays = json_decode($usuario->days, true) ?? [];

            $mergedDays = array_merge($existingDays, $days);

            $uniqueDays = array_values(array_unique($mergedDays));

            $usuario->days = json_encode($uniqueDays);*/

            $usuario->save();
            //@dd($usuario);
        } else {
            $days = [];

            if (!empty($row['sexta'])) {
                $days[] = 'sexta';
            }
            if (!empty($row['sabado'])) {
                $days[] = 'sabado';
            }
            if (!empty($row['domingo'])) {
                $days[] = 'domingo';
            }

            $usuario = new User([
                'name' => $row['nome'],
                'email' =>  $row['email'],
                'role' => $row['role'] ?? "user",
                'setor1' => $row['setor1'],
                'subsetor1' => $row['subsetor1'],
                'setor2' => $row['setor2'],
                'subsetor2' => $row['subsetor2'],
                'on' => $row['on'],
                'password' => bcrypt($row['telefone']),
                'days' => json_encode($days),
            ]);
            echo ('Error');
            $existingDays = json_decode($usuario->days, true) ?? [];

            $mergedDays = array_merge($existingDays, $days);

            $uniqueDays = array_values(array_unique($mergedDays));

            $usuario->days = json_encode($uniqueDays);
            //@dd($days);
            $usuario->save();
        }
    }
}
