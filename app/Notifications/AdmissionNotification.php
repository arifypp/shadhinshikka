<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdmissionNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $admission;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($admission)
    {
        //
        $this->admission    =   $admission;
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
        ->subject('নতুন অ্যাডমিশন নোটিফিকেশন')
        ->line('জনাব '. $this->admission->user->name. ', একটি কোর্সে অ্যাডমিশন রিকুয়েস্ট পাঠিয়েছেন।')
        ->action('বিস্তারিত জানতে ক্লিক করুন', route('admin.dashboard'))
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
            'id'                        => $this->admission->id,
            'courses_id'                => $this->admission->courses_id,
            'users_id'                  => $this->admission->user->name,
            'created_at'                => $notifiable
        ];
    }
}
