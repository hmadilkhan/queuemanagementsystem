<?php

namespace App\Livewire\Country;

use App\Models\Country;
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

    #[On('deleteCountry')] 
    public function deleteCountry()
    {
        Country::findOrFail($this->deleteId)->delete();
        $this->dispatch('countryDeleted');
        $this->dispatch('hide-delete-modal');
    }

    public function render()
    {
        return view('livewire.country.delete');
    }
}
