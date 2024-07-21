<?php

namespace App\Livewire\UserPermission;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    protected $userPermissions;

    protected $listeners = [
        'userPermissionAdded' => 'refreshUserPermissions',
        'userPermissionDeleted' => 'refreshUserPermissions',
    ];

    public function mount()
    {
        $this->refreshUserPermissions();
    }

    #[On('refreshUserPermissions')]
    public function refreshUserPermissions()
    {
        $this->userPermissions = User::with("permissions")->get();
    }

    public function render()
    {
        return view('livewire.user-permission.index', [
            "userPermissions" => $this->userPermissions,
        ])->layout("layouts.app");
    }
}
