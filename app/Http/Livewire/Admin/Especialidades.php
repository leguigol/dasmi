<?php

namespace App\Http\Livewire\Admin;

use App\Models\especialidade;
use Livewire\Component;
use Livewire\WithPagination;

class Especialidades extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search='';

    public function render()
    {    
        if($this->search!=''){
            $especia=especialidade::Where('especialidad_nombre', 'like', '%'.$this->search.'%')->paginate(10);
        }else{
            $especia=especialidade::paginate(10);
        }

            return view('livewire.admin.especialidades',compact('especia'));
    }
}
