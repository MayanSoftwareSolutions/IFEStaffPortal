<?php

namespace App\Notifications;

use App\Models\Role;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RoleCreationNotification extends Notification
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
                    ->line('A new role profile '. $this->role->title.' was created on '. $this->role->created_at->format('j F, Y'))
                    ->line('To see details of the permissions assigned, please log in to view system access')
                    ->action('View Role', url('/roles/'. $this->role->id))
                    ->line('You have recieved this notification because you are listed as a system administrator')
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
        return [
            'notify' => ['A new role profile '. $this->role->title .' was created on '. $this->role->created_at->format('j F, Y')],
            'url' => ['/roles/'. $this->role->id]
        ];
    }
}
