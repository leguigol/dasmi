<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto_cab extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'prestador_id',
        'afiliado_id',
        'fechaprescrip',
        'matricula',
        'medicoprescrip',
        'staff',
        'diagnostico',
        'observaciones',
        'cateauto',
        'coseguro'        
    ];
}
