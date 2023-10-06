<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto_det extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'autocab_id',
        'practica_id',
        'cantidad',
        'coseguro'
    ];
}
