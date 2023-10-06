<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudio extends Model
{
    use HasFactory;

    protected $fillable=[
        'evolucion_id',
        'padron_id',
        'estudio_id',
        'fecha'
    ];

    public function nomestudio(){
        return $this->hasOne(practica::class,'id','estudio_id');
 
    }
    public function evolucion(){
        return $this->hasone(Evolucione::class,'id','evolucion_id');
    }
}
