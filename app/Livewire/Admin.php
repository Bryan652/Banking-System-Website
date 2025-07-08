<?php

namespace App\Livewire;

use App\Models\accounts;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Admin extends Component
{

    public $search = '';
    public function render()
    {
        $userAccounts = accounts::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', '!=', 'admin')
                    ->where('name', 'like', '%' . $this->search . '%');
            })
            ->get();

        $adminAccounts = accounts::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', 'admin')
                    ->where('name', 'like', '%' . $this->search . '%');
            })
            ->get();

        $staffAccounts = accounts::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', 'staff')
                    ->where('name', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.admin', compact('userAccounts', 'adminAccounts', 'staffAccounts'));
    }
}
