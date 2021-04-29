<?php

namespace App\Exports;

use App\Skp;
use Maatwebsite\Excel\Concerns\FromCollection;

class SkpExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        return Skp::all();
    }
}