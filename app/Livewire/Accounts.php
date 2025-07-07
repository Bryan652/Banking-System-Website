<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Accounts extends Component
{
    public function render()
    {
        $account = auth()->user()->accounts;
        return view('livewire.accounts', [
            'account' => $account
        ]);
    }
}
