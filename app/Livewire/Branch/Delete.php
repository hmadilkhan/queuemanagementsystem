<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
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

    #[On('deleteBranch')]
    public function deleteBranch()
    {
        Branch::findOrFail($this->deleteId)->delete();
        $this->dispatch('branchDeleted');
        $this->dispatch('hide-delete-modal');
    }
    
    public function render()
    {
        return view('livewire.branch.delete');
    }
}
