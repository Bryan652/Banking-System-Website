<?php

namespace App\Livewire;

use App\Models\transactions as ModelsTransactions;
use Livewire\Component;

class Transactions extends Component
{
    // accounts_id, type, amount, description, and (created_at, updated at) now

    public $accounts_id, $type, $amount, $description, $created_at, $updated_at;

    public function render()
    {
        $user = auth()->user();
        $transactions = $user->accounts->pluck('transaction')->flatten();

        return view('livewire.transactions', [
            'transactions' => $this->$transactions,
        ]);
    }
}
