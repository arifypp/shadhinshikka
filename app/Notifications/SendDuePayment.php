<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendDuePayment extends Notification implements ShouldQueue
{
    use Queueable;

    protected $payment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($payment)
    {
        //
        $this->payment    =   $payment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->greeting('আসসালামুলাইকুম প্রিয় ' .$notifiable->name)
        ->subject('পেমেন্ট রিকুয়েস্ট')
        ->line('স্বাগতম '. $notifiable->name, ' আপনার পেমেন্ট সম্পন্নভাবে গ্রহণ করা হয়েছে। আমরা আপনার পেমেন্ট এর তথ্য যাচাই করে কনফার্মেশন মেইল পাঠাব।')
        ->action('বিস্তারিত জানতে ক্লিক করুন', route('user.dashboard'))
        ->line('ভালবাসা অবিরাম স্বাধীন শিক্ষার সঙ্গে থাকার জন্য!');
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
            'id'                        => $this->payment->id,
            'courses_id'                => $this->payment->course_ids,
            'users_name'                => $this->payment->user->name,
            'created_at'                => $notifiable
        ];
    }
}
