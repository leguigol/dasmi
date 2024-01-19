<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Internacione;
use Carbon\Carbon;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 


class InternacionesAdmin extends Component
{
    use WithPagination;
    
    protected $paginationTheme="bootstrap";
    public $search='';
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

            $internaciones=Internacione::Where('centro_id', Auth::user()->centro_id)
            ->whereHas('padron',function($query){
            $query->where('apellido', 'like', '%'.$this->search.'%');
            })->paginate(10);                        

        return view('livewire.internaciones-admin',compact('internaciones'));

    }
    public function formatearFecha($fecha)
    {
        return Carbon::parse($fecha)->format('d/m/Y');  
    }    
}
