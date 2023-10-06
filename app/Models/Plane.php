<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;

    protected $fillable=[
        'plan_nombre',
        'convenio_id'
    ];

    public function convenio(){
        return $this->belongsTo(Convenio::class, 'convenio_id');
    }
}
