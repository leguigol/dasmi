<?php

namespace App\Http\Livewire\Admin;

use App\Models\vademecum as ModelsVademecum;
use Livewire\Component;
use Livewire\WithPagination;

class Vademecum extends Component
{

    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search='';

    public function render()
    {
        $drogas=modelsVademecum::where('monodroga','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.vademecum',compact('drogas'));
    }
}
