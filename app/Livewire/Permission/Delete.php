<?php

namespace App\Livewire\Permission;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

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

    #[On('deletePermission')] 
    public function deletePermission()
    {
        Permission::findOrFail($this->deleteId)->delete();
        $this->dispatch('permissionDeleted');
        $this->dispatch('hide-delete-modal');
    }
    
    public function render()
    {
        return view('livewire.permission.delete');
    }
}
