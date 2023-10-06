<?php

namespace App\Http\Livewire;

use App\Models\horario_medico;
use App\Models\Medico;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ListarHorarios extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search='';

    // public function updatingSearch(){
    //     $this->resetPage();
    // }

    public function render()
    {
        $horarios=Horario_medico::join('medicos','horario_medicos.medico_id','medicos.id')->select('horario_medicos.id','medico_apellido','dia','desde','hasta','intervalo')->where('medico_apellido','like','%'.$this->search.'%')->paginate(6);

        return view('livewire.listar-horarios',compact('horarios'));
    }
}
