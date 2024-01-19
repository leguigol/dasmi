<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class internacione extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'prestador_id',
        'centro_id',
        'padron_id',
        'fechahora',
        'fecha_ingreso',
        'hora_ingreso',
        'medico',
        'tipo_internacion',
        'servicio',
        'diagnostico',
        'observaciones'
    ];

    public function padron(){
        return $this->belongsTo(Padrone::class,'padron_id');
    }
    public function prestador()
    {
        return $this->belongsTo(Prestadore::class,'prestador_id');
    }
}
