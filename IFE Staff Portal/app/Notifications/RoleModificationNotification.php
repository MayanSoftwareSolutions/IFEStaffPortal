<?php

namespace App\Notifications;

use App\Models\Role;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RoleModificationNotification extends Notification
{
    use Queueable;

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }


    public function via($notifiable)
    {
        return ['mail', 'database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The role profile '. $this->role->title.' was modified on '. $this->role->updated_at->format('j F, Y'))
                    ->line('To see details of the permissions assigned, please log in to view system access')
                    ->action('View Role', url('/roles/'. $this->role->id))
                    ->line('You have recieved this notification because you are listed as a system administrator')
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
        return [
            'notify' => ['The role profile '. $this->role->title.' was modified on '. $this->role->updated_at->format('j F, Y')],
            'url' => ['/roles/'. $this->role->id]
        ];
    }
}