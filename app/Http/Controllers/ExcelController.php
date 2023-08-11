<?php

namespace App\Http\Controllers;

use App\Exports\DadosExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DadosImport;
use App\Exports\PresencaExport;

class ExcelController extends Controller
{
    public function importForm()
    {
        return view('excel.import_excel');
    }
    public function exportForm()
    {
        return view('excel.export_excel');
    }

    public function import(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if ($file->isValid()) {
                Excel::import(new DadosImport(), $file);
                return redirect()->back()->with('success', 'Dados importados com sucesso!');
            } else {
                return redirect()->back()->with('error', 'O arquivo enviado não é válido.');
            }
        } else {
            return redirect()->back()->with('error', 'Nenhum arquivo enviado.');
        }
    }

}

