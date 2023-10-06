<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class droga extends Model
{
    use HasFactory;

    protected $fillable=[
        'padron_id',
        'droga',
        'inyecta',
        'cuales',
        'fisica',
        'veces',
        'cuales',
        'diuresis',
        'catarsis',
        'sueño'
    ];
}
