<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Lang;



class ShopApplicationSubmitEmail extends Notification
{
    use Queueable;

    public $file;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $downloadUrl = url($this->file);

        return (new MailMessage)
                    ->from('verify@panda47.net')
                    ->subject('Shop Application Contract')
                    ->line('We are sending this email with a contract attachment to confirm your shop application request')
                    ->attach($this->file, [
                        'as' => 'contract.pdf',
                        'mime' => 'application/pdf',
                    ])
                    ->line('Thank you for using our application!')
                    ->line(Lang::get('Start Selling Now'));

                    
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
            //
        ];
    }
}
