<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cateautori extends Model
{
    use HasFactory;

    protected $fillable=[
        'descripcion',
        'tiene_coseguro',
        'coseguro'
    ];

}
