<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestadore extends Model
{
    use HasFactory;

    protected $fillable=[
        'prestador_nombre',
        'domicilio',
        'localidad',
        'especialidad_id',
        'fecha_baja',
    ];

    public function especialidad(){
        return $this->hasOne(especialidade::class,'id','especialidad_id');
    }
}
