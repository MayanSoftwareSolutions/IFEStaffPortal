<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_profile_widget',
        'user_activity_log_widget',
        'user_notifications',
    ];


    //Role Relationship
    public function users()
    {
        return $this->hasOne(UserSettings::class);
    }
}
