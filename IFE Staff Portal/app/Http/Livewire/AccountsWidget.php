<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Livewire\WithPagination;

class AccountsWidget extends Component
{
    use WithPagination;

    public $user;
    public $team;
    public $settings;

    public function mount()
    {
        $this->user = Auth::user();
        $this->settings = UserSettings::where('user_id', Auth::id())->first();

    }

    public function render()
    {
        return view('livewire.accounts-widget');
    }
}
