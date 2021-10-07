<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
    {
        use HasApiTokens;
        use HasFactory;
        use HasProfilePhoto;
        use Notifiable;
        use TwoFactorAuthenticatable;
        use LogsActivity;

        

        protected $fillable = [
            'name',
            'email',
            'job_title',
            'department',
            'organisation',
            'password',
            'last_login',
            'last_login_ip',
            'active',
        ];


        protected $hidden = [
            'password',
            'remember_token',
            'two_factor_recovery_codes',
            'two_factor_secret',
        ];


        protected $casts = [
            'email_verified_at' => 'datetime',
            'last_login' => 'datetime',
        ];


        protected $appends = [
            'profile_photo_url',
        ];

        public function setPasswordAttribute($password)
        {
            if (trim($password) === '') {
                return;
            }
            $this->attributes['password'] = bcrypt($password);
        }

        // Activity Logging
        public function getActivitylogOptions(): LogOptions
        {
            return LogOptions::defaults()->logOnly([
            'name',
            'email',
            'organisation',
            'job_title',
            'department',
            'active',]);
        }

        protected static $recordEvents = ['created', 'updated', 'deleted'];

        protected static $logName = 'user';

        public function getDescriptionForEvent(string $eventName): string
        {
            return "{$eventName}";
        }

        protected static $ignoreChangedAttributes = ['password'];

        protected static $logOnlyDirty = true;

        protected static $submitEmptyLogs = false;

        protected $dates = [
            'last_login'
        ];


        protected static $logAttributes = [
            'name',
            'email',
            'organisation',
            'job_title',
            'department',
            'active',
        ];

        //Role relationship
        public function roles()
        {
            return $this->belongsToMany(Role::class);
        }

        public function settings()
        {
            return $this->hasOne(UserSettings::class);
        }

    }
