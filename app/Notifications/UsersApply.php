<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UsersApply extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $apply;
    public function __construct($apply)
    {
        //
        $this->apply=$apply;
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
            'user_id'=>$this->apply['user_id'],
            'user_name'=>$this->apply['user_name'],
            'team_id'=>$this->apply['team_id'],
            'team_name'=>$this->apply['team_name'],
            'created_at'=>$this->apply['created_at'],
        ];
    }


}
