<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Please set your own password')
            ->line('You are receiving this email because we created your account and thats why we send password reset request for your account.')
            ->action('Reset Password', url('password/reset', $this->token))
            ->line('ভালবাসা অবিরাম স্বাধীন শিক্ষার সঙ্গে থাকার জন্য!');
    }
}
