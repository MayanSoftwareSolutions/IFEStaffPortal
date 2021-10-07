<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Support\Facades\Auth;

class UserControlSettings extends Component
{
    public $settings;
    public bool $profile_widget;
    public bool $activity_widget;
    public bool $user_notifications;
    public bool $email_notifications;
    public $success;

    public function mount()
    {
        $this->settings = UserSettings::where('user_id', Auth::id())->first();
        $this->profile_widget = (bool) $this->settings->user_profile_widget;
        $this->activity_widget = (bool) $this->settings->user_activity_log_widget;
        $this->user_notifications = (bool) $this->settings->user_notifications;
        $this->email_notifications = (bool) $this->settings->email_notifications;

        // dd($this->profile_widget);
    }

    public function change($field)
    {
        $getSetting = $this->settings->$field;

        if($getSetting == 1)
        {
            $change = UserSettings::where('id', $this->settings->id)->update(
            [$field => 0]
        );
        }
        elseif($getSetting == 0)
        {
            $change = UserSettings::where('id', $this->settings->id)->update(
            [$field => 1]);
        }

        $this->success = 'Your system setting have been applied';
        session()->flash('message', $this->success);
        $this->emitTo('dashboard-sortable', '$refresh');

    }


    public function render()
    {
        return view('livewire.user-control-settings');
    }
}
