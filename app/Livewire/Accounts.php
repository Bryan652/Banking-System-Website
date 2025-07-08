<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Accounts extends Component
{
    public function render()
    {
        $account = auth()->user()->accounts;

        $user = auth()->user();

        $user1 = auth()->user()->load('accounts.transaction');

        $transactions = $user1->accounts->pluck('transaction')->flatten();

        $loans = auth()->user()->loans;

        return view('livewire.accounts', [
            'account' => $account,
            'user' => $user,
            'transaction' => $transactions,
            'loans' => $loans
        ]);
    }
}
