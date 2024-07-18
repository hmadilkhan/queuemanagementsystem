<?php

namespace App\Livewire\User;

use App\Models\Branch;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class Form extends Component
{
    use WithFileUploads;

    public $userId;
    public $roleId = [];
    public $companyId;
    public $branchId;
    public $name;
    public $email;
    public $username;
    public $password;
    public $password_confirmation;
    public $companies;
    public $roles;
    public $branches = [];
    public $mode = 0; // Mode 0 is for insert 1 for Update
    public $image;
    public $prevImage;

    protected $listeners = ['editUser'];

    public function mount()
    {
        $this->companies = Company::all();
        $this->roles = Role::all();
        if ($this->companyId) {
            $this->branches = Branch::where('company_id', $this->companyId)->get();
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    #[Computed()]
    public function updatedCompanyId($companyId)
    {
        $this->branches = Branch::where('company_id', $companyId)->get();
        $this->branchId = null; // reset branch selection
    }

    protected $rules = [
        'companyId' => 'required|numeric',
        'branchId' => 'required|numeric',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'username' => 'required|string|max:255',
        'password' => 'required|min:8|confirmed',
        'image' => 'nullable|image|max:1024'
    ];

    #[On('editUser')]
    public function editUser($userId)
    {
        $user = User::findOrFail($userId);
        $this->userId = $user->id;
        $this->companyId = $user->company_id;
        $this->branchId = $user->branch_id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->password = $user->password;
        $this->password_confirmation = $user->password;
        $this->prevImage = $user->image;
        $this->mode = 1;
        $this->branches = Branch::where('company_id', $this->companyId)->get();
        $this->roleId = $user->getRoleNames()->toArray();
    }

    public function save()
    {
        $this->validate();
        if ($this->prevImage) {
            Storage::disk('public')->delete($this->prevImage);
        }
        if ($this->image != "") {
            $imageName = $this->image->store('users', 'public');
        }

        $user = User::updateOrCreate(['id' => $this->userId], [
            "company_id" => $this->companyId,
            "branch_id" => $this->branchId,
            "name" => $this->name,
            "email" => $this->email,
            "username" => $this->username,
            "password" => Hash::make($this->password),
            "image" => ($this->image != "" ? $imageName : $this->prevImage),
        ]);
        $user->syncRoles($this->roleId);

        $this->resetInputFields();

        $this->dispatch('userAdded');
    }

    private function resetInputFields()
    {
        $this->userId = null;
        $this->roleId = [];
        $this->companyId = null;
        $this->branchId = null;
        $this->name = null;
        $this->email = null;
        $this->username = null;
        $this->password = null;
        $this->image = null;
        $this->prevImage = null;
        $this->mode = 0;
    }

    public function render()
    {
        return view('livewire.user.form');
    }
}
