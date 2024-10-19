<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountCreated extends Notification
{
    use Queueable;

    protected $activationLink;

    public function __construct($activationLink)
    {
        $this->activationLink = $activationLink;
    }

    public function via($notifiable)
    {
        return ['mail']; // Envoi par e-mail
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Activation de votre compte')
            ->line('Votre compte a été créé avec succès.')
            ->action('Activer mon compte', $this->activationLink)
            ->line('Merci d\'utiliser notre application!');
    }

   
   

   
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
