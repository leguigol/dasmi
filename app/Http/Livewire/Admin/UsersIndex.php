<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search='';

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        
        $users=User::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->with('roles')
        ->paginate(10);
        return view('livewire.admin.users-index', compact('users'));
    }
}
