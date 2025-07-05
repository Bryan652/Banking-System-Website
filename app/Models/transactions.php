<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transactions extends Model
{
    use HasFactory;

    public function accounts() {
        return $this->belongsToMany(accounts::class);
    }
}
