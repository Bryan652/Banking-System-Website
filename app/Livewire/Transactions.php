<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\transactions as ModelsTransactions;

class Transactions extends Component
{
    public $accounts_id, $type, $amount, $description;
    public $accounts = [];

    protected $rules = [
        'accounts_id' => 'required',
        'type'        => 'required|in:Deposit,Withdraw,Transfer',
        'amount'      => 'required|numeric|min:0.01',
        'description' => 'required',
    ];

    public function mount()
    {
        $this->fetchTransaction();
    }

    public function fetchTransaction()
    {
        $user = auth()->user();

        $accountIds = $user->accounts->pluck('id');

        $this->accounts = ModelsTransactions::whereIn('accounts_id', $accountIds)->get();
        }

    public function submit()
    {
        // create a changes to amount, based on the type of transaction

        $this->validate();

        ModelsTransactions::create([
            'accounts_id' => $this->accounts_id,
            'type'        => $this->type,
            'amount'      => $this->amount,
            'description' => $this->description,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        session()->flash('message', 'Transaction Successful');
        $this->reset(['accounts_id', 'type', 'amount', 'description']);

        session()->flash('test', 'test this shiets');

        session()->flash('');

        // Refresh after submit
        $this->fetchTransaction();
    }

    public function render()
    {
        return view('livewire.transactions');
    }
}
