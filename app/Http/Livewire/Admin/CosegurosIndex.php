<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\Admin\Coseguros;
use App\Models\Convenio;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\coseguro;
use RealRashid\SweetAlert\Facades\Alert;

class CosegurosIndex extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $selectedConvenio='';
    public $search='';
    public $delete_id;

    protected $listeners=['render','deleteConfirmed'=>'deleteCoseguro'];

    public function mount(){
        $this->selectedConvenio="1";
    }
    public function render()
    {

        $convenios=Convenio::all();
        $selectedConvenio = $this->selectedConvenio ?? '';
        if($this->search!=''){
            $coseguros=coseguro::Where('pca_desde', 'like', '%'.$this->search.'%')->Where('convenio_id','=',$selectedConvenio)->get();
        }else{
            $coseguros=Coseguro::where('convenio_id','=',$selectedConvenio)->get();
        }

        return view('livewire.admin.coseguros-index',compact('convenios','coseguros'));
    }

    public function deleteConfirmation($coseguro){
        $this->delete_id=$coseguro;
        $this->dispatchBrowserEvent('delete-confirmation');
    } 
    public function deleteCoseguro()
    {
        $coseguro=coseguro::where('id', $this->delete_id)->first();
        $coseguro->delete();

        $this->dispatchBrowserEvent('coseguroDeleted');
    }
}
