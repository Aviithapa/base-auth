<?php

namespace App\Broadcasting;

use App\Models\User;
use App\Services\Sms\SmsHandler;
use Illuminate\Notifications\Notification;

class SmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (!method_exists($notification, 'toSms')) {
            return;
        }

        $message = $notification->toSms($notifiable);

        // Assuming SmsHandler is your custom class to send SMS
        $smsHandler = new SmsHandler();
        $response = $smsHandler->send($notifiable->phone, $message);

        // Optional: throw if failed
        if (is_object($response) && isset($response->response_code) && $response->response_code === 1001) {
            throw new \Exception('Failed to send OTP via SMS.');
        }

        return $response;
    }
}
