<?php

namespace App\Http\Livewire\Admin;

use App\Models\practica;
use Livewire\Component;
use Livewire\WithPagination;


class Nomenclador extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search='';

    public function render()
    {
        $practicas=Practica::where('descripcion', 'like', '%'.$this->search.'%')->orWhere('codigo', 'like', '%'.$this->search.'%')
        ->paginate(10);
        return view('livewire.admin.nomenclador',compact('practicas'));
    }
}
