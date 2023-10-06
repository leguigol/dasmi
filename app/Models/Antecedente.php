<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    use HasFactory;

    protected $fillable=[
        'padron_id',
        'hta',
        'dbt',
        'tbc',
        'asma',
        'epoc',
        'alergia',
        'reuma',
        'ets',
        'otros',
        'acv',
        'am',
        'hiv',
        'chagas',
        'tumores',
        'psiquiatrico',
        'neurologico',
        'relaciones',
        'alergiamedica',
        'cuales',
        'interna1',
        'interna2',
        'interna3'
    ];
}
