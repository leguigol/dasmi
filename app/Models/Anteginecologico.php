<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anteginecologico extends Model
{
    use HasFactory;

    protected $fillable=[
        'padron_id',
        'menarca',
        'irs',
        'ritmo',
        'fum',
        'pap',
        'mx',
        'mac',
        'g',
        'a',
        'p',
        'c'
    ];
}
