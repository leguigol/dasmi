<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crecimiento extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'padron_id',
        'fecha_consulta',
        'fecha_nacimiento',
        'sexo',
        'edad',
        'estatura',
        'z_estatura',
        'peso',
        'z_peso',
        'imc',
        'medico_id',
        'centro_id'
    ];
}
