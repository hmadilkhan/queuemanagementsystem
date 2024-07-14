<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $countries;

    protected $listeners = [
        'countryAdded' => 'refreshCountries',
        'countryDeleted' => 'refreshCountries',
    ];

    public function mount()
    {
        $this->refreshCountries();
    }
    
    #[On('refreshCountries')] 
    public function refreshCountries()
    {
        $this->countries = Country::all();
    }

    public function render()
    {
        return view('livewire.country.index')->layout('layouts.app');
    }
}
