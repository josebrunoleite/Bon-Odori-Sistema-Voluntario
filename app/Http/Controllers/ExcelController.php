<?php

// app/Http/Controllers/ExcelController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DadosImport;
use App\Models\User; // Substitua pelo modelo correto que representa a tabela onde deseja inserir os dados

class ExcelController extends Controller
{
    public function importForm()
    {
        return view('excel.import_excel');
    }

    public function import(Request $request)
    {
        // Verifica se o arquivo foi enviado com sucesso
        if ($request->hasFile('file')) {
            $file = $request->file('file');
    
            // Verifica se o arquivo é válido
            if ($file->isValid()) {
                // Importa os dados do Excel usando a classe DadosImport
                Excel::import(new DadosImport(), $file);
    
                return redirect()->back()->with('success', 'Dados importados com sucesso!');
            } else {
                return redirect()->back()->with('error', 'O arquivo enviado não é válido.');
            }
        } else {
            return redirect()->back()->with('error', 'Nenhum arquivo enviado.');
        }
    }
    
    public function export(Request $request)
    {
        $file = $request->file('file');

        // Verifica se o arquivo é válido
        if ($file->isValid()) {
            // Importa os dados do Excel usando a classe DadosImport
            Excel::import(new DadosImport(), $file);

            return redirect()->back()->with('success', 'Dados importados com sucesso!');
        }

        return redirect()->back()->with('error', 'Erro ao importar o arquivo.');
    }

}

