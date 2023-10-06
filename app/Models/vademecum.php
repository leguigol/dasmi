<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vademecum extends Model
{
    use HasFactory;

    protected $fillable=[
        'monodroga',
        'producto',
        'presentacion',
        'laboratorio',
        'accion',
        'usuario',
    ];

}
