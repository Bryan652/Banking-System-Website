<?php

namespace App\Livewire;

use App\Models\accounts;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Admin extends Component
{
    public $search = '';

    public function render()
    {
        $searchTerm = $this->search;

        $userAccounts = User::where('role', 'user')
            ->where('name', 'like', "%{$searchTerm}%")
            ->get();

        $adminAccounts = User::where('role', 'admin')
            ->where('name', 'like', "%{$searchTerm}%")
            ->get();

        $staffAccounts = User::where('role', 'staff')
            ->where('name', 'like', "%{$searchTerm}%")
            ->get();

        return view('livewire.admin', [
            'userAccounts' => $userAccounts,
            'adminAccounts' => $adminAccounts,
            'staffAccounts' => $staffAccounts,
        ]);
    }
}
