<?php

namespace App\Livewire\City;

use App\Models\City;
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

    #[On('deleteCity')] 
    public function deleteCity()
    {
        City::findOrFail($this->deleteId)->delete();
        $this->dispatch('cityDeleted');
        $this->dispatch('hide-delete-modal');
    }
    public function render()
    {
        return view('livewire.city.delete');
    }
}
