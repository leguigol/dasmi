<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendiente extends Model
{
    use HasFactory;

    protected $fillable=[
        'evolucion_id',
        'padron_id',
        'pendiente',
    ];

}
