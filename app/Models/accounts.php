<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class accounts extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transaction() {
        return $this->hasMany(transactions::class);
    }

    // For transactions

    public function sentTransfer() {
        return $this->hasMany(transfers::class, 'from_account_id', 'to_account_id');
    }

    public function receivedTransfer() {
        return $this->hasMany(transfers::class, 'from_account_id', 'to_account_id');
    }

    public function allTransfer() {
        return $this->sentTransfer->merge($this->receivedTransfer)->unique('id');
    }

    // For atms

    public function atm() {
        return $this->hasMany(atm::class);
    }

}
