<?php

namespace dantaylorseo\MaytapiChannel;

use Illuminate\Notifications\Notification;

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
        if (($group && ! $group_id) || (! $group && ! $phoneNumber = $notifiable->routeNotificationFor('maytapi', $notification))) {
            return;
        }

        // @phpstan-ignore method.notFound
        $message = $notification->toMail($notifiable);
        $this->service->send($group, $phoneNumber ?? null, $message);
    }
}
