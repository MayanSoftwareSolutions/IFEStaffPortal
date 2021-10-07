<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserPermissionChangeNotification extends Notification
{
    use Queueable;

    private $getUser;

    public function __construct($getUser)
    {
        $this->user = $getUser;
    }


    public function via($notifiable)
    {
        return ['mail', 'database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The user '.$this->user->name. ' was updated recently. This update included a change to system permissions')
                    ->action('View Account', url('/users/'.$this->user->id))
                    ->line('You recieved this notification becasuse you are registered as a system administrator')
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
        return [
            'notify' => ['The user '.$this->user->name. ' was updated recently. This update included a change to system permissions'],
            'url' => ['/user/'.$this->user->id]
        ];
    }
}
