<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alcoholismo extends Model
{
    use HasFactory;

    protected $fillable=[
        'padron_id',
        'bebe',
        'critica',
        'tomaba',
        'ganas',
        'culpable',
        'mañana'
    ];
}
