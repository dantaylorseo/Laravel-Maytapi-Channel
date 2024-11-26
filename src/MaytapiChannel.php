<?php

namespace dantaylorseo\MaytapiChannel;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class MaytapiChannel
{
    protected MaytapiService $service;

    public function __construct(MaytapiService $service)
    {
        $this->service = $service;
    }

    /**
     * Send the given notification.
     */
    public function send(object $notifiable, Notification $notification): void
    {
        $group = config('maytapi-channel.send_to_channel');
        $group_id = config('maytapi-channel.group_id');
        $phoneNumber = $notifiable->routeNotificationFor('maytapi', $notification);

        if (($group && ! $group_id) || (! $group && ! $phoneNumber)) {
            return;
        }

        // @phpstan-ignore method.notFound
        $message = $notification->toMail($notifiable);
        try {
            if ($group) {
                $this->service->sendToGroup($message);
            } elseif ($phoneNumber) {
                $this->service->sendToNumber($phoneNumber, $message);
            }
        } catch (\Exception $e) {
            Log::error('MaytapiChannel: '.$e->getMessage());
        }
    }
}
