<?php

namespace App\Livewire\City;

use App\Models\City;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $cities;

    protected $listeners = [
        'cityAdded' => 'refreshCities',
        'cityDeleted' => 'refreshCities',
    ];

    public function mount()
    {
        $this->refreshCities();
    }
    
    #[On('refreshCities')] 
    public function refreshCities()
    {
        $this->cities = City::with("country")->get();
    }
    public function render()
    {
        return view('livewire.city.index')->layout('layouts.app');
    }
}
