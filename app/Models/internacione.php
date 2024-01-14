<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class internacione extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'centro_id',
        'padron_id',
        'fechahora',
        'fechahora_ingreso',
        'tipo_internacion',
        'servicio',
        'diagnostico',
        'observaciones'
    ];

    public function padron(){
        return $this->belongsTo(Padrone::class,'padron_id');
    }

}
