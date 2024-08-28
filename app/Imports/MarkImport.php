<?php

namespace App\Imports;


use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class MarkImport implements ToModel, WithCalculatedFormulas
{
    public function model(array $row)
    {
        return $row;
    }
}