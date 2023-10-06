<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Centro;

class CentrosIndex extends Component
{
    public $search='';
    protected $paginationTheme="bootstrap";

    public function render()
    {
        if($this->search!=''){
            $centros=Centro::Where('centro_nombre', 'like', '%'.$this->search.'%')->get();
        }else{
            $centros=Centro::all();
        }

        return view('livewire.admin.centros-index', compact('centros'));
    }
}
