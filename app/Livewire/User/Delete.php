<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

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

    #[On('deleteUser')]
    public function deleteUser()
    {
        User::findOrFail($this->deleteId)->delete();
        $this->dispatch('userDeleted');
        $this->dispatch('hide-delete-modal');
    }
    
    public function render()
    {
        return view('livewire.user.delete');
    }
}
