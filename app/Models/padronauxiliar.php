<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class padronauxiliar extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable=[
        'afiliado',
        'apellido',
        'nombres',
        'documento',
        'cuil',
        'alta',
        'padron',
        'zona',
        'titular',
        'fechanac',
        'sexo',
        'parentesco_id',
        'plan_id',
        'convenio_id',
        'centro_id'
    ];
}
