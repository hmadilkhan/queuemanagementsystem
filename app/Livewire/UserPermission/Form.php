<?php

namespace App\Livewire\UserPermission;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Form extends Component
{
    public $userId;
    public $user_id;
    public $permission_id = [];
    public $users;
    public $permissions;

    protected $listeners = ['editUserPermission'];

    public function mount()
    {
        $this->users = User::all();
        $this->permissions = Permission::all();
    }

    protected $rules = [
        'permission_id' => 'required',
        'user_id' => 'required',
    ];

    #[On('editUserPermission')]
    public function editUserPermission($userId)
    {
        $user = User::findOrFail($userId);
        $this->user_id = $user->id;
        $this->permission_id = $user->permissions->pluck('name')->toArray();
        // $this->users = User::all();
        // $this->permissions = Permission::all();
    }

    public function save()
    {
        $user = User::findOrFail($this->user_id);
        $user->syncPermissions($this->permission_id);
        $this->resetInputFields();

        $this->dispatch('userPermissionAdded');
    }

    private function resetInputFields()
    {
        $this->userId = null;
        $this->user_id = null;
        $this->permission_id = [];
    }

    public function render()
    {
        return view('livewire.user-permission.form');
    }
}
