<?php

namespace App\Livewire\Role;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Delete extends Component
{
    public $deleteId;

    protected $listeners = ['confirmDelete'];

    #[On('confirmDelete')] 
    public function confirmDelete($deleteId)
    {
        $this->deleteId = $deleteId;
        $this->dispatch('show-delete-modal');
    }

    #[On('deleteRole')] 
    public function deleteRole()
    {
        Role::findOrFail($this->deleteId)->delete();
        $this->dispatch('roleDeleted');
        $this->dispatch('hide-delete-modal');
    }
    
    public function render()
    {
        return view('livewire.role.delete');
    }
}
