<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
    /** @use HasFactory<\Database\Factories\AdminsFactory> */
    use HasFactory;

    public function loans() {
        return $this->hasMany(loans::class, 'admins_id');
    }

    public function approval() {
        return $this->hasMany(approval::class);
    }

    public function audit() {
        return $this->hasMany(audit::class);
    }
}
