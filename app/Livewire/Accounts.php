<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class Accounts extends Component
{
    public function render()
    {
        $user = auth()->user();
        $userId = $user->id;

        $account = Cache::remember("user.{$userId}.accounts", now()->addMinutes(5), function () use ($user) {
            return $user->accounts;
        });

        $transactions = Cache::remember("user.{$userId}.transactions", now()->addMinutes(5), function () use ($user) {
            return $user->load('accounts.transaction')->accounts->pluck('transaction')->flatten();
        });

        $totalBalance = Cache::remember("user.{$userId}.totalBalance", now()->addMinutes(5), function () use ($user) {
            return $user->accounts->sum('balance');
        });

        $loans = Cache::remember("user.{$userId}.loans", now()->addMinutes(5), function () use ($user) {
            return $user->borrower()->with('borrower')->latest()->get();
        });


        return view('livewire.accounts', [
            'account' => $account,
            'user' => $user,
            'transaction' => $transactions,
            'loans' => $loans,
            'total' => $totalBalance,
        ]);
    }
}
