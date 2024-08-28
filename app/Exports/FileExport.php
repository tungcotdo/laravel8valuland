<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FileExport implements FromView
{

    protected $excelData;

    public function __construct(array $excelData)
    {
        $this->excelData = $excelData;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('scholarship.admin.export', [
            'students' => $this->excelData
        ]);
    }
    
}