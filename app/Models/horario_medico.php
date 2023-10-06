<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario_medico extends Model
{
    use HasFactory;

    protected $fillable=[
        'medico_id',
        'centro_id',
        'dia',
        'desde',
        'hasta',
        'intervalo'
    ];

    public function medico(){
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}
