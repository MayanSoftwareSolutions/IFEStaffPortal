<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RoleDeletionNotification extends Notification
{
    use Queueable;

    public $role;


    public function __construct($role)
    {
        $this->role = $role;

    }


    public function via($notifiable)
    {
        return ['mail','database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)

                    ->line('The role profile '.$this->role->title.' was deleted on '.now()->format('j F, Y'))
                    ->action('Roles and Permissions', url('/roles/'))
                    ->line('You have recieved this notification because you are listed as a system administrator')
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
        return [
            'notify' => ['The role profile '.$this->role->title.' was deleted on '.now()->format('j F, Y')],
            'url' => ['/roles']
        ];
    }
}
