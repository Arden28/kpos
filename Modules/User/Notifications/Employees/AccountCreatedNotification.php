<?php

namespace Modules\User\Notifications\Employees;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use Modules\User\Emails\Employees\WelcomeEmail;

class AccountCreatedNotification extends Notification
{
    use Queueable;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Bienvenue chez Koverae')
                    ->line('Salut '.$notifiable->name.' nous sommes content de vous avoir à bord !')
                    ->action('Commencer maintenant', 'https://www.dashboard.koverae.com/auth/login')
                    ->line('Merci d\'avoir choisi Koverae !');
        // return Mail::to($this->user->email)->send(new WelcomeEmail($this->request, $this->user, $this->company));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
