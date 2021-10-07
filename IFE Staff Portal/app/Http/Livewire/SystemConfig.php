<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserSettings;

class SystemConfig extends Component
{
    public function render()
    {
        return view('livewire.system-config');
    }
}
