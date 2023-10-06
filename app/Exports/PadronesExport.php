<?php

namespace App\Exports;

use App\Models\Padrone;
use Maatwebsite\Excel\Concerns\FromCollection;

class PadronesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Padrone::all();
    }
}
