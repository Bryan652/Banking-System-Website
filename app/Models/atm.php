<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atm extends Model
{
    /** @use HasFactory<\Database\Factories\AtmFactory> */
    use HasFactory;

    public function account() {
        return $this->belongsTo(accounts::class);
    }
}
