<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserSettings;
use Illuminate\Support\Facades\Auth;

class DashboardSortable extends Component
{
    public $settings;
    protected $listeners = [
        '$refresh'
    ];

    public function mount()
    {
        $this->settings = UserSettings::where('user_id', Auth::id())->first();
    }
    public function render()
    {
        return view('livewire.dashboard-sortable');
    }
}
