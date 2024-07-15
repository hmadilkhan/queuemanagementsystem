<?php

namespace App\Livewire\Company;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;


    public $companyId;
    public $countryId;
    public $cityId;
    public $name;
    public $email;
    public $mobile;
    public $ptcl;
    public $address;
    public $countries;
    public $cities = [];
    public $mode = 0; // Mode 0 is for insert 1 for Update
    public $image;

    protected $listeners = ['editCompany'];

    public function mount()
    {
        $this->countries = Country::all();
        if ($this->countryId) {
            $this->cities = City::where('country_id', $this->countryId)->get();
        }

    }

    #[Computed()]
    public function updatedCountryId($countryId)
    {
        $this->cities = City::where('country_id', $countryId)->get();
        $this->cityId = null; // reset city selection
    }

    protected $rules = [
        'countryId' => 'required|numeric',
        'cityId' => 'required|numeric',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'mobile' => 'required|string|max:255',
        'ptcl' => 'required|string|max:255',
        'image' => 'nullable|image|max:1024'
    ];

    #[On('editCompany')]
    public function editCompany($companyId)
    {
        $company = Company::findOrFail($companyId);
        $this->companyId = $company->id;
        $this->countryId = $company->country_id;
        $this->cityId = $company->city_id;
        $this->name = $company->name;
        $this->email = $company->email;
        $this->mobile = $company->mobile;
        $this->ptcl = $company->ptcl;
        $this->address = $company->address;
        $this->image = $company->image;
        $this->mode = 1;
        $this->cities = City::where('country_id', $company->country_id)->get();
    }

    public function save()
    {
        // $this->validate();

        // if ($this->image != "") {
        //     $imageName = $this->image->store('companies', 'public');
        // }
        // dd($this->companyId);
        Company::updateOrCreate(['id' => $this->companyId], [
            "country_id" => $this->countryId,
            "city_id" => $this->cityId,
            "name" => $this->name,
            "email" => $this->email,
            "mobile" => $this->mobile,
            "ptcl" => $this->ptcl,
            "address" => $this->address,
            // "image" =>  $imageName,
        ]);

        $this->resetInputFields();

        $this->dispatch('companyAdded');
    }

    private function resetInputFields()
    {
        $this->companyId = null;
        $this->countryId = null;
        $this->cityId = null;
        $this->name = null;
        $this->email = null;
        $this->mobile = null;
        $this->ptcl = null;
        $this->image = null;
        $this->address = null;
        $this->mode = 0;
    }

    public function render()
    {
        return view('livewire.company.form');
    }
}
