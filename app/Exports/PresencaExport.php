<?php

namespace App\Exports;

use App\Models\Presenca;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class PresencaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Presenca::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'Email',
            'Data de Criação',
            'setor',
            'subsetor'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Coluna C (Data de Criação) será formatada como data
        ];
    }
}