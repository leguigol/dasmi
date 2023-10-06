<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coseguro extends Model
{
    use HasFactory;

    protected $fillable=[
        'pca_desde',
        'pca_hasta',
        'cantidad',
        'convenio_id',
        'coseguro',
        'vigencia'
    ];
}
