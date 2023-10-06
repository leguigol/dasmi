<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabaquismo extends Model
{
    use HasFactory;

    protected $fillable=[
        'padron_id',
        'fuma',
        'desdefuma',
        'canti',
        'nunca',
        'dejo',
        'desdedejo',
        'minutos',
        'piensa'
    ];
}
