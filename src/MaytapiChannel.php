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
        // @phpstan-ignore method.notFound
        $message = $notification->toWhatsApp($notifiable);

        $this->service->send($message);
    }
}
