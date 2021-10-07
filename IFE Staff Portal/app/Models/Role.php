<?php

namespace App\Models;

use App\Observers\RoleObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use HasFactory;
    use Notifiable;
    use LogsActivity;

    protected $fillable = [
        'title'
    ];


    //User Relationship
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Permission Relationship
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // Activity Logging
        public function getActivitylogOptions(): LogOptions
        {
            return LogOptions::defaults()->logOnly([
            'title',
            'created_at',
            'updated_at',
            ]);
        }

        protected static $recordEvents = ['created', 'updated', 'deleted'];

        protected static $logName = 'role';

        public function getDescriptionForEvent(string $eventName): string
        {
            return "{$eventName}";
        }

        protected static $logOnlyDirty = true;

        protected static $submitEmptyLogs = false;

        protected $dates = [
            'created_at',
            'updated_at'
        ];

        protected static $logAttributes = [
            'title',
            'created_at',
            'updated_at',
        ];

}
