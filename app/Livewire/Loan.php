<?php

namespace App\Livewire;

use Livewire\Component;

class Loan extends Component
{
    public $amount, $interest_rate, $term_months, $status;

    protected $rules = [
        'amount' => 'required|decimal',
        'term_months' => '',
        'status' => '',
    ];

    public $role;

    public function mount()
    {
        $this->role = auth()->user()->role;
    }

    public function render()
    {
        return view('livewire.loan');
    }

    public function submit() {

    }

    /**
        * $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
        * $table->decimal('amount', 12, 2);
        * $table->decimal('interest_rate', 5, 2);
        * $table->integer('term_months');
        * $table->enum('status', ['Pending', 'Approved', 'Paid']);
        * $table->foreignIdFor(admins::class)->nullable();
        * $table->timestamps();
     */
}
