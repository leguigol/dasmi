<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evolucione extends Model
{
    use HasFactory;
    protected $fillable=[
        'padron_id',
        'fecha',
        'subjetivo',
        'objetivo',
        'medico_id',
        'centro_id',
    ];
    
    public function problema(){
        return $this->hasMany(hcproblema::class,'evolucion_id','id');
    }
    public function nommedico(){
        return $this->hasOne(User::class,'id','medico_id');
    }
}
