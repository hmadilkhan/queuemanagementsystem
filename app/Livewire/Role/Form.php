<?php

namespace App\Livewire\Role;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Form extends Component
{
    public $roleId;
    public $name;

    protected $listeners = ['editRole'];

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    #[On('editRole')] 
    public function editRole($roleId)
    {
        $role = Role::findOrFail($roleId);
        $this->roleId = $role->id;
        $this->name = $role->name;
    }

    public function save()
    {
        $this->validate();

        Role::updateOrCreate(['id' => $this->roleId], [
            'name' => $this->name,
        ]);

        $this->resetInputFields();

        $this->dispatch('roleAdded');
    }

    private function resetInputFields()
    {
        $this->roleId = null;
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.role.form');
    }
}
