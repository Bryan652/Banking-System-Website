<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Admin extends Component
{

    public function render()
    {
        return view('livewire.admin');
    }
}
