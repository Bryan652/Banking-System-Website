<?php

namespace App\Livewire;

use App\Models\loans;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminLoan extends Component
{
    public $amount, $interest_rate, $term_months;
    public $role;
    public $loans = [];
    public $statusFilter = 'All';

    protected $rules = [
        'amount' => 'required|numeric|min:1',
        'interest_rate' => 'nullable|numeric|min:0',
        'term_months' => 'required|integer|min:1',
    ];

    public function mount()
    {
        $this->role = Auth::user()->role;
        $this->fetchLoans();
    }

    public function render()
    {
        return view('livewire.admin-loan');
    }

    public function submit()
    {
        $this->validate();

        loans::create([
            'user_id' => Auth::id(),
            'amount' => $this->amount,
            'interest_rate' => $this->interest_rate,
            'term_months' => $this->term_months,
            'status' => 'Pending',
        ]);

        session()->flash('message', 'Loan request submitted!');
        $this->reset(['amount', 'interest_rate', 'term_months']);

        $this->fetchLoans();
    }

    public function approveLoan($id)
    {
        $loan = loans::findOrFail($id);
        $loan->status = 'Approved';
        $loan->approved_by = Auth::id();
        $loan->save();

        $this->fetchLoans();
    }

    public function markAsPaid($id)
    {
        $loan = loans::findOrFail($id);
        $loan->status = 'Paid';
        $loan->save();

        $this->fetchLoans();
    }

    protected function fetchLoans()
    {
        $query = loans::with('borrower')->latest();

        if ($this->role === 'admin') {
            if ($this->statusFilter !== 'All') {
                $query->where('status', $this->statusFilter);
            }
        } else {
            $query->where('borrower_id', auth()->id());
            if ($this->statusFilter !== 'All') {
                $query->where('status', $this->statusFilter);
            }
        }

        $this->loans = $query->get();
    }

    public function updatedStatusFilter()
    {
        $this->fetchLoans();
    }
}
