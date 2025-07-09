<?php

namespace App\Livewire;

use App\Models\accounts;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Admin extends Component
{
    public $search = '';
    public $copiedSearch = '';

    public function copySearch()
    {
        $this->copiedSearch = $this->search;
    }

    public function render()
    {
       $searchTerm = $this->search;

        $userAccounts = accounts::with('user')
            ->whereHas('user', function ($query) use ($searchTerm) {
                $query->where('role', '!=', 'admin')
                    ->where('name', 'like', '%' . $searchTerm . '%');
            })->get();

        $adminAccounts = accounts::with('user')
            ->whereHas('user', function ($query) use ($searchTerm) {
                $query->where('role', 'admin')
                    ->where('name', 'like', '%' . $searchTerm . '%');
            })->get();

        $staffAccounts = accounts::with('user')
            ->whereHas('user', function ($query) use ($searchTerm) {
                $query->where('role', 'staff')
                    ->where('name', 'like', '%' . $searchTerm . '%');
            })->get();

        return view('livewire.admin', [
            'userAccounts' => $userAccounts,
            'adminAccounts' => $adminAccounts,
            'staffAccounts' => $staffAccounts,
        ]);
    }
}
