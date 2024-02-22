<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadoInternacione extends Model
{
    use HasFactory;

    protected $fillable=[
        'internacion_id',
        'tipo',
        'fecha_desde',
        'fecha_hasta',
        'estado',
        'observaciones',
        'auditor_id'
    ];
    
    public function auditor()
    {
        return $this->belongsTo(User::class, 'auditor_id');
    }

    // Método para obtener el nombre del auditor
    public function getAuditorNameAttribute()
    {
        return $this->auditor->name;
    }

}
