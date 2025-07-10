<?php

namespace App\Livewire;

use App\Models\loans;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Loan extends Component
{
    public $amount;
    public $interest_rate;
    public $term_months;

    public $userLoans = [];

    protected $rules = [
        'amount' => 'required|numeric|min:1',
        'interest_rate' => 'nullable|numeric|min:0',
        'term_months' => 'required|integer|min:1',
    ];

    public function mount()
    {
        $this->fetchLoans();
    }

    public function submit()
    {
        $this->validate();

        loans::create([
            'borrower_id' => Auth::id(),
            'amount' => $this->amount,
            'interest_rate' => $this->interest_rate,
            'term_months' => $this->term_months,
            'status' => 'Pending',
        ]);

        session()->flash('message', 'Loan request submitted successfully.');
        $this->reset(['amount', 'interest_rate', 'term_months']);

        $this->fetchLoans();
    }

    public function fetchLoans()
    {
        $this->userLoans = loans::where('borrower_id', Auth::id())->latest()->get();
    }

    public function render()
    {
        return view('livewire.loan');
    }
}
