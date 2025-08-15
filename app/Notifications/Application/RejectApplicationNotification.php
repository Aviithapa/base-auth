<?php

namespace App\Notifications\Application;

use App\Broadcasting\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectApplicationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;
    protected $remarks;

    /**
     * Create a new notification instance.
     */
    public function __construct($user, $remarks)
    {
        $this->user = $user;
        $this->remarks = $remarks;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', SmsChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
         return (new MailMessage)
            ->subject('Application Rejected - Nepal Pharmacy Council')
            ->markdown('emails.pages.application_reject', [
                'user' => $this->user,
                'remarks' => $this->remarks
            ]);
    }

    /**
     * Get the sms representation of the notification.
     */
    public function toSms($notifiable): string
    {
        return "Your application has been rejected for the following reason: {$this->remarks}";
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
