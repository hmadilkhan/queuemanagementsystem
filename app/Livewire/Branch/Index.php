<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $branches1;

    protected $listeners = [
        'branchAdded' => 'refreshBranches',
        'branchDeleted' => 'refreshBranches',
    ];

    // public function mount()
    // {
    //     $this->refreshBranches();
    // }

    #[On('refreshBranches')]
    public function refreshBranches()
    {
        $this->branches1 = Branch::with("company", "country", "city")->paginate(2);
    }

    public function render()
    {
        return view('livewire.branch.index', ["branches" => Branch::with("company", "country", "city")->paginate(2)])->layout('layouts.app');
    }
}
