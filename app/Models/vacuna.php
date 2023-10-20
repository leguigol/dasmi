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
<<<<<<< HEAD
    public function estaSeleccionada($valor, $valor2, $padronId)
    {
        return $this->vacunasPaciente()->where('vacuna_value', $valor)->where('vacuna_id',$valor2)->where('padron_id', $padronId)->exists();
=======

    public function estaSeleccionada($valor, $padronId)
    {
        return $this->vacunasPaciente()->where('vacuna_value', $valor)->where('padron_id', $padronId)->exists();
>>>>>>> e7e78e6667078f8e3ee33ad189a290d9818818b9
    }

    public function vacunasPaciente()
    {
        return $this->hasMany(VacunasPaciente::class);
    }
<<<<<<< HEAD

=======
>>>>>>> e7e78e6667078f8e3ee33ad189a290d9818818b9
}
