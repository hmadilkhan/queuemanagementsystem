<?php

namespace App\Livewire\City;

use App\Models\City;
use App\Models\Country;
use Livewire\Attributes\On;
use Livewire\Component;

class Form extends Component
{
    public $cityId;
    public $country_id;
    public $name;
    public $countries;

    protected $listeners = ['editCity'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'country_id' => 'required|exists:countries,id',
    ];

    public function mount()
    {
        $this->countries = Country::all();
    }

    #[On('editCity')] 
    public function editCity($cityId)
    {
        $city = City::findOrFail($cityId);
        $this->cityId = $city->id;
        $this->country_id = $city->country_id;
        $this->name = $city->name;
    }

    public function save()
    {
        $this->validate();

        City::updateOrCreate(['id' => $this->cityId], [
            'country_id' => $this->country_id,
            'name' => $this->name,
        ]);

        $this->resetInputFields();

        $this->dispatch('cityAdded');
    }

    private function resetInputFields()
    {
        $this->cityId = null;
        $this->country_id = null;
        $this->name = '';
    }
    public function render()
    {
        return view('livewire.city.form');
    }
}
