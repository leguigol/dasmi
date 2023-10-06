<?php

namespace App\Http\Livewire\Admin;

use App\Models\prestadore;
use Livewire\Component;
use Livewire\WithPagination;

class Prestadores extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search='';

    public function render()
    {

        if($this->search!=''){
            $presta=prestadore::Where('prestador_nombre', 'like', '%'.$this->search.'%')->paginate(10);
        }else{
            $presta=prestadore::paginate(10);
        }

        return view('livewire.admin.prestadores',compact('presta'));
    }
}
