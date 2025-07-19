<?php

namespace App\Livewire;

use App\Models\accounts;
use Livewire\Component;

class CreateAccount extends Component
{
    public $account_number, $account_type, $balance, $status;

    protected $rules = [
        'account_type'   => 'required|in:Savings,Checking,Salary,Joint,Student',
        'balance'        => 'required|numeric',
    ];

    public function render()
    {
        return view('livewire.create-account');
    }

    public function submit()
    {
        $this->validate();

        $latestAccount = accounts::latest('id')->first();
        $nextNumber = $latestAccount ? $latestAccount->id + 1 : 1;

        $accountNumber = str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        accounts::create([
            'user_id'        => auth()->id(),
            'account_number' => $accountNumber,
            'account_type'   => $this->account_type,
            'balance'        => $this->balance,
            'status'         => 'Active',
        ]);

        session()->flash('message', 'Account created successfully!');

        $this->reset(['account_type', 'balance']);

        return redirect()->route('dashboard');
    }
}
