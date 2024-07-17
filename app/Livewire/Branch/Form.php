<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $branchId;
    public $companyId;
    public $countryId;
    public $cityId;
    public $name;
    public $email;
    public $mobile;
    public $ptcl;
    public $address;
    public $mode = 0; // Mode 0 is for insert 1 for Update
    public $image;
    public $prevImage;
    public $countries;
    public $companies;
    public $cities = [];

    protected $listeners = ['editBranch'];

    public function mount()
    {
        $this->countries = Country::all();
        $this->companies = Company::all();
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
        'companyId' => 'required|numeric',
        'countryId' => 'required|numeric',
        'cityId' => 'required|numeric',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'mobile' => 'required|string|max:255',
        'ptcl' => 'required|string|max:255',
        'image' => 'nullable|image|max:1024'
    ];

    #[On('editBranch')]
    public function editBranch($branchId)
    {
        $branch = Branch::findOrFail($branchId);
        $this->branchId = $branch->id;
        $this->companyId = $branch->company_id;
        $this->countryId = $branch->country_id;
        $this->cityId = $branch->city_id;
        $this->name = $branch->name;
        $this->email = $branch->email;
        $this->mobile = $branch->mobile;
        $this->ptcl = $branch->ptcl;
        $this->address = $branch->address;
        $this->prevImage = $branch->image;
        $this->mode = 1;
        $this->cities = City::where('country_id', $branch->country_id)->get();
    }

    public function save()
    {
        $this->validate();
        if ($this->prevImage) {
            Storage::disk('public')->delete($this->prevImage);
        }
        if ($this->image != "") {
            $imageName = $this->image->store('branches', 'public');
        }
        
        Branch::updateOrCreate(['id' => $this->branchId], [
            "company_id" => $this->companyId,
            "country_id" => $this->countryId,
            "city_id" => $this->cityId,
            "name" => $this->name,
            "email" => $this->email,
            "mobile" => $this->mobile,
            "ptcl" => $this->ptcl,
            "address" => $this->address,
            "image" =>  ($this->image != "" ? $imageName : $this->prevImage),
        ]);

        $this->resetInputFields();

        $this->dispatch('branchAdded');
    }

    private function resetInputFields()
    {
        $this->branchId = null;
        $this->companyId = null;
        $this->countryId = null;
        $this->cityId = null;
        $this->name = null;
        $this->email = null;
        $this->mobile = null;
        $this->ptcl = null;
        $this->image = null;
        $this->prevImage = null;
        $this->address = null;
        $this->mode = 0;
    }
    
    public function render()
    {
        return view('livewire.branch.form');
    }
}
