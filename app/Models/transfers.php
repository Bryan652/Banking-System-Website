<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transfers extends Model
{
    /** @use HasFactory<\Database\Factories\TransfersFactory> */
    use HasFactory;

    public function account() {
        return $this->belongsTo(accounts::class);
    }
}


