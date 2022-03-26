<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CourseAssignedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $course;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        //
        $this->course = $course;
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
        ->subject('কোর্স এসাইনড নোটিফিকেশন')
        ->line('আপনাকে '. $this->course['name']. ' এই কোর্সে শিক্ষক হিসেবে যুক্ত করা হয়েছে। এই কোর্সের সকল ফিচারড স্বাধীন শিক্ষার ড্যাশবোর্ডে পাবেন।')
        ->action('বিস্তারিত জানতে ক্লিক করুন', route('course.manage'))
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
            'id'                => $this->course->id,
            'name'              => $this->course->name,
            'created_at'        => $notifiable
        ];
    }
}
