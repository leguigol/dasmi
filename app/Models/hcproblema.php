<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hcproblema extends Model
{
    use HasFactory;

    protected $fillable=[
        'evolucion_id',
        'padron_id',
        'problema_id',
        'inicio',
        'resolucion'
    ];
    public function nomproblema(){
        return $this->hasone(ciap2::class,'id','problema_id');
    }

}
