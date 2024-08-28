<?php

namespace App\Imports;


use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class FileImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
    }
}