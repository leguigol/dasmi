<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable=[
        'medico_matricula',
        'medico_apellido',
        'medico_nombres',
        'medico_especialidad',
        'medico_estado',
        'centro_id'
    ];

    public function centro(){
        return $this->belongsTo(Centro::class, 'centro_id');
    }
    public function horario(){
        return $this->hasmany(horario_medico::class,'medico_id','id');
    }
}
