<?php

namespace dantaylorseo\MaytapiChannel;

use Illuminate\Support\Facades\Http;

class MaytapiService
{
    protected string $apiKey;

    protected string $packageId;

    protected string $phoneId;

    protected string $groupId;

    public function __construct(string $apiKey, string $packageId, string $phoneId, string $groupId)
    {
        $this->apiKey = $apiKey;
        $this->packageId = $packageId;
        $this->phoneId = $phoneId;
        $this->groupId = $groupId;
    }

    public function send(string $message): void
    {
        $response = Http::withHeaders([
            'x-maytapi-key' => $this->apiKey,
        ])->post("https://api.maytapi.com/api/{$this->packageId}/[$this->phoneId]/sendMessage", [
            'to_number' => "{$this->groupId}",
            'type' => 'text',
            'message' => $message,
        ]);

    }
}
