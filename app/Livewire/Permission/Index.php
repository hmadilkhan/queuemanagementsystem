<?php

namespace App\Livewire\Permission;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public $permissions;

    protected $listeners = [
        'permissionAdded' => 'refreshPermissions',
        'permissionDeleted' => 'refreshPermissions',
    ];

    public function mount()
    {
        $this->refreshPermissions();
    }
    
    #[On('refreshPermissions')] 
    public function refreshPermissions()
    {
        $this->permissions = Permission::all();
    }
    
    public function render()
    {
        return view('livewire.permission.index')->layout("layouts.app");
    }
}
