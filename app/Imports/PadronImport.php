<?php

namespace App\Imports;

use App\Models\padronauxiliar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PadronImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new padronauxiliar([
            'afiliado'=>$row['afiliado'],
            'apellido'=>$row['apellido'],
            'nombres'=>$row['nombres'],
            'documento'=>$row['documento'],
            'cuil'=>$row['cuil'],
            'alta'=>$row['alta'],
            'padron'=>$row['padron'],
            'zona'=>$row['zona'],
            'titular'=>$row['titular'],
            'fechanac'=>$row['fechanac'],
            'sexo'=>$row['sexo'],
            'parentesco_id'=>$row['parentesco_id'],
            'plan_id'=>$row['plan_id'],
            'convenio_id'=>$row['convenio_id'],
            'centro_id'=>$row['centro_id']
        ]);
    }
}
