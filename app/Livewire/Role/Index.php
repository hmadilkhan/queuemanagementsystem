<?php

namespace App\Livewire\Role;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $roles;

    protected $listeners = [
        'roleAdded' => 'refreshRoles',
        'roleDeleted' => 'refreshRoles',
    ];

    public function mount()
    {
        $this->refreshRoles();
    }
    
    #[On('refreshRoles')] 
    public function refreshRoles()
    {
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.role.index')->layout('layouts.app');
    }
}
