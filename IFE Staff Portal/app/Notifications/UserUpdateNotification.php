<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserUpdateNotification extends Notification
{
    use Queueable;


    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->line('Hello '.$this->user->name)
                ->line('Some changes have been made to your Mayan account')
                ->line('This may have been done by you or by the system administrator, however, its advised you login to check if the updated information is correct')
                ->line('If you are unable to login. please contact your system administrator immediately')
                ->action('Login', url('/'));
    }

    public function toArray($notifiable)
    {
        return
        [
            'notify' => ['Information linked to your account has been changed'],
            'url' => ['/user/'.$this->user->id]
        ];
    }
}
