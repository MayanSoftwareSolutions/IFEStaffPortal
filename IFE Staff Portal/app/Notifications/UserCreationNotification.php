<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreationNotification extends Notification
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
                    ->line('Welcome '.$this->user->name)
                    ->line('This is our TMO management digital platform, the smart client management solution.')
                    ->line('An account has been created for you which can be accessed via the below link. Your login credential will be sent to you by an administrator shortly.')
                    ->line('Please ensure you change your password when you first login. This can be done by clicking the user icon and selecting My Profile.')
                    ->action('My Account', url('/login'));
    }

    public function toArray($notifiable)
    {
        return
        [
            'notify' => ['Welcome '.$this->user->name],
            'url' => ['/user/profile']
        ];
    }
}
