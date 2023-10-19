<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacunasPaciente extends Model
{
    use HasFactory;

    protected $fillable=[
        'vacuna_id',
        'vacuna_value',
        'padron_id',
        'medico_id',
        'centro_id'
    ];

    public function nombreVacuna(){
        return $this->belongsTo(vacuna::class, 'vacuna_id');
    }

}
