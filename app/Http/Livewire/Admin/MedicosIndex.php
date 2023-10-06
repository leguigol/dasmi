<?php

namespace App\Http\Livewire\Admin;

use App\Models\Medico;
use Livewire\Component;
use Livewire\WithPagination;

class MedicosIndex extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search='';

    public function render()
    {
        $medicos=Medico::where('medico_nombres', 'like', '%'.$this->search.'%')
        ->orWhere('medico_apellido', 'like', '%'.$this->search.'%')
        ->paginate(5);
        return view('livewire.admin.medicos-index', compact('medicos'));
    }
}
