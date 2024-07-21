<?php

namespace App\Livewire\Permission;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Form extends Component
{
    public $permissionId;
    public $name;

    protected $listeners = ['editPermission'];

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    #[On('editPermission')] 
    public function editPermission($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        $this->permissionId = $permission->id;
        $this->name = $permission->name;
    }

    public function save()
    {
        $this->validate();

        Permission::updateOrCreate(['id' => $this->permissionId], [
            'name' => $this->name,
        ]);

        $this->resetInputFields();

        $this->dispatch('permissionAdded');
    }

    private function resetInputFields()
    {
        $this->permissionId = null;
        $this->name = '';
    }
    
    public function render()
    {
        return view('livewire.permission.form');
    }
}
