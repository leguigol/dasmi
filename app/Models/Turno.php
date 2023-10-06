<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'medico_id',
        'centro_id',
        'fechahora',
        'padron_id',
        'asistio',
        'horallega',
        'disponible',
        'telefono',
        'observa'
    ];

    public function medico(){
        return $this->belongsTo(Medico::class,'medico_id');
    }
    public function padron(){
        return $this->belongsTo(Padrone::class,'padron_id');
    }
    public function convenio(){
        return $this->hasOneThrough(Convenio::class,padrone::class,'convenio_id','id');
    }
}
