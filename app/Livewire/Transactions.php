<?php

namespace App\Livewire;

use App\Models\accounts;
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
        $this->validate();

        $account = accounts::find($this->accounts_id);

        if(!$account) {
            session()->flash('message', 'account not found.');
            return;
        }

        if($this->type === 'Withdraw') {
            if($account->balance < $this->amount) {
                session()->flash('message', 'Invalid amount');
                return;
            }
            $account->update([
                'balance' => $account->balance - $this->amount
            ]);
        }

        if($this->type === 'Deposit') {
            $account->update([
                'balance' => $account->balance + $this->amount
            ]);
        }

        ModelsTransactions::create([
            'accounts_id' => $this->accounts_id,
            'type'        => $this->type,
            'amount'      => $this->amount,
            'description' => $this->description,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        session()->flash('message', 'Transaction Successful');

        session()->flash('');

        $this->fetchTransaction();
    }



    public function render()
    {
        return view('livewire.transactions');
    }
}
