<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vacuna extends Model
{
    use HasFactory;

    protected $fillable=[
        'edad',
        'vacuna',
    ];    
    public function estaSeleccionada($valor, $valor2, $padronId)
    {
        return $this->vacunasPaciente()->where('vacuna_value', $valor)->where('vacuna_id',$valor2)->where('padron_id', $padronId)->exists();
    }    

    public function vacunasPaciente()
    {
        return $this->hasMany(VacunasPaciente::class);
    }

}
