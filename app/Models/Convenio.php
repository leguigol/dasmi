<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    protected $fillable=[
        'convenio_nombre',
    ];

    public function plan(){
        return $this->hasMany(Plane::class);
    }

}
