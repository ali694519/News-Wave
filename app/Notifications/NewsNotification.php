<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewsNotification extends Notification
{
    use Queueable;

    private $news_id;
    private $user_create;
    private $title;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($news_id,$user_create,$title)
    {
        $this->news_id = $news_id;
        $this->user_create = $user_create;
        $this->title = $title;
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

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'news_id'=>$this->news_id,
            'user_create'=>$this->user_create,
            'title'=>$this->title,
        ];
    }
}
