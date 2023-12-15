<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padrone extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'afiliado',
        'apellido',
        'nombres',
        'documento',
        'cuil',
        'added',
        'alta',
        'padron',
        'zona',
        'titular',
        'fechanac',
        'sexo',
        'parentesco_id',
        'altapadron',
        'bajapadron',
        'estado',
        'plan_id',
        'convenio_id',
        'centro_id'
    ];

    public function convenio(){
        return $this->belongsTo(Convenio::class, 'convenio_id');
    }
    public function vacunas(){
        return $this->belongsTo(Vacuna::class, 'id');
    }
}
