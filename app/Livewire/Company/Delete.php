<?php

namespace App\Livewire\Company;

use App\Models\Company;
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

    #[On('deleteCompany')]
    public function deleteCompany()
    {
        Company::findOrFail($this->deleteId)->delete();
        $this->dispatch('companyDeleted');
        $this->dispatch('hide-delete-modal');
    }

    public function render()
    {
        return view('livewire.company.delete');
    }
}
