<?php

namespace App\Livewire;

use App\Models\accounts;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Admin extends Component
{

    public $search = '';
    public function render()
    {
        $userAccounts = Cache::remember("userAccounts.search.{$this->search}", now()->addMinutes(5), function () {
            return accounts::with('user')
                ->whereHas('user', function ($query) {
                    $query->where('role', '!=', 'admin')
                        ->where('name', 'like', '%' . $this->search . '%');
            })->get();
        });

        $adminAccounts = Cache::remember("adminAccounts.search.{$this->search}", now()->addMinutes(5), function() {
            return accounts::with('user')
                ->whereHas('user', function ($query) {
                    $query->where('role', 'admin')
                        ->where('name', 'like', '%' . $this->search . '%');
            })->get();
        });

        $staffAccounts = Cache::remember("staffAccounts.search.{$this->search}", now()->addMinutes(5), function() {
            return accounts::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', 'staff')
                    ->where('name', 'like', '%' . $this->search . '%');
            })->get();
        });


        return view('livewire.admin', compact('userAccounts', 'adminAccounts', 'staffAccounts'));
    }
}
