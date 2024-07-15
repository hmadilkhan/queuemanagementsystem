<?php

namespace App\Livewire\Company;

use App\Models\Company;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $companies;

    protected $listeners = [
        'companyAdded' => 'refreshCompanies',
        'companyDeleted' => 'refreshCompanies',
    ];

    public function mount()
    {
        $this->refreshCompanies();
    }
    
    #[On('refreshCompanies')] 
    public function refreshCompanies()
    {
        $this->companies = Company::with("country","city")->get();
    }

    public function render()
    {
        return view('livewire.company.index')->layout('layouts.app');
    }
}
