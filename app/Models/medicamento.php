<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vademecum;

class medicamento extends Model
{
    use HasFactory;

    protected $fillable=[
        'evolucion_id',
        'padron_id',
        'medicamento_id',
        'indicacion',
        'fecha',
        'cronico'
    ];

    public function nommedicamento(){
        return $this->hasOne(Vademecum::class,'id','medicamento_id');
    }
    public function evolucion(){
        return $this->hasOne(Evolucione::class,'id','evolucion_id');
    }
}
