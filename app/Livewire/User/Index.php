<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $users;

    protected $listeners = [
        'userAdded' => 'refreshUsers',
        'userDeleted' => 'refreshUsers',
    ];

    public function mount()
    {
        $this->refreshUsers();
    }
    
    #[On('refreshUsers')] 
    public function refreshUsers()
    {
        $this->users = User::with("country","city")->get();
    }

    public function render()
    {
        return view('livewire.user.index');
    }
}
