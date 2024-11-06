<?php

namespace dantaylorseo\MaytapiChannel;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MaytapiService
{
    protected string $apiKey;

    protected string $productId;

    protected string $phoneId;

    protected string $groupId;

    public function __construct(string $apiKey, string $productId, string $phoneId, string $groupId)
    {
        $this->apiKey = $apiKey;
        $this->productId = $productId;
        $this->phoneId = $phoneId;
        $this->groupId = $groupId;
    }

    public function send(bool $sendToGroup, string $phoneNumber, MaytapiMessage $message): void
    {
        $response = Http::withHeaders([
            'x-maytapi-key' => $this->apiKey,
        ])->post("https://api.maytapi.com/api/{$this->productId}/{$this->phoneId}/sendMessage", [
            'to_number' => $sendToGroup ? $this->groupId : $phoneNumber,
            'type' => 'text',
            'message' => $message,
        ]);

        Log::info('Response: '.$response->body());

    }
}
