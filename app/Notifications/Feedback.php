<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Feedback extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $feedback;
    public function __construct($feedback)
    {
        $this->feedback=$feedback;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable){
        return [
            'text'=>$this->feedback['text'],
            'team_id'=>$this->feedback['team_id'],
            'team_name'=>$this->feedback['team_name'],
            'created_at'=>$this->feedback['created_at'],
        ];
    }
}
