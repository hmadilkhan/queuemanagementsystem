<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Livewire\Attributes\On;
use Livewire\Component;

class Form extends Component
{
    public $countryId;
    public $name;

    protected $listeners = ['editCountry'];

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    #[On('editCountry')] 
    public function editCountry($countryId)
    {
        $country = Country::findOrFail($countryId);
        $this->countryId = $country->id;
        $this->name = $country->name;
    }

    public function save()
    {
        $this->validate();

        Country::updateOrCreate(['id' => $this->countryId], [
            'name' => $this->name,
        ]);

        $this->resetInputFields();

        $this->dispatch('countryAdded');
    }

    private function resetInputFields()
    {
        $this->countryId = null;
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.country.form');
    }
}
