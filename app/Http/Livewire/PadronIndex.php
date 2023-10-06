<?php

namespace App\Http\Livewire;

use App\Models\Padrone;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PadronIndex extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search='';

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {

        $padrones=Padrone::Where('centro_id', Auth::user()->centro_id)
        ->Where(function($query){
            $query->where('apellido', 'like', '%'.$this->search.'%')
            ->orWhere('documento', 'like', '%'.$this->search.'%');
        })->paginate(10);

        return view('livewire.padron-index', compact('padrones'));
    }
}
