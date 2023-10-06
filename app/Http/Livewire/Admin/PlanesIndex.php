<?php

namespace App\Http\Livewire\Admin;

use App\Models\Plane;
use Livewire\Component;

class PlanesIndex extends Component
{
    public $search='';
    protected $paginationTheme="bootstrap";
    
    public function render()
    {

        if($this->search!=''){
            $planes=Plane::where('plan_nombre', 'like', '%'.$this->search.'%')->get();
        }else{
        $planes=Plane::all();
        }

        return view('livewire.admin.planes-index',compact('planes'));
    }
}
