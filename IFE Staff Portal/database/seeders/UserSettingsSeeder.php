<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserSettings;

class UserSettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            [
                'id'             => 1,
                'user_id'           => 1,
                'user_profile_widget'          => 1,
                'user_activity_log_widget'          => 1,
                'user_notifications'          => 1,
            ],
            [
                'id'             => 2,
                'user_id'           => 2,
                'user_profile_widget'          => 1,
                'user_activity_log_widget'          => 1,
                'user_notifications'          => 1,
            ],
        ];

        UserSettings::insert($settings);
    }
}
