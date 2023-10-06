<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evolucione;

class hcplane extends Model
{
    use HasFactory;

    protected $fillable=[
        'evolucion_id',
        'padron_id',
        'detalle',
        'proceso_id',
        'problema_id'
    ];
    public function nomproceso(){
        return $this->hasone(proceso::class,'id','proceso_id');
    }
    public function nomproblema(){
        return $this->hasone(ciap2::class,'id','problema_id');
    }
    public function evolucion(){
        return $this->hasone(evolucione::class,'id','evolucion_id');
    }

}
