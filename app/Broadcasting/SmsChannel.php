<?php

namespace App\Broadcasting;

use App\Services\Sms\SmsHandler;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class SmsChannel
{
    /**
     * Send the given notification.
     */
    public function send($notifiable, Notification $notification)
    {
        // Check if notification has toSms method
        if (!method_exists($notification, 'toSms')) {
            return;
        }

        $message = $notification->toSms($notifiable);

        try {
            $smsHandler = new SmsHandler();
            $response = $smsHandler->send($notifiable->phone, $message);

            Log::error('SMS sent', [
                'phone' => $notifiable->phone,
                'message' => $message,
                'response' => $response,
                'data' => $notifiable->toArray()
            ]);
            // Optional: log response if failed
            if (is_object($response) && isset($response->response_code) && $response->response_code === 1001) {
                Log::error('Failed to send SMS', [
                    'phone' => $notifiable->phone,
                    'message' => $message,
                    'response' => $response,
                ]);
                throw new \Exception('Failed to send OTP via SMS.');
            }

            return $response;
        } catch (\Exception $e) {
            Log::error('SMS sending failed: ' . $e->getMessage(), [
                'phone' => $notifiable->phone,
                'message' => $message,
            ]);
            throw $e;
        }
    }
}
