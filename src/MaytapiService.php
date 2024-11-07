<?php

namespace dantaylorseo\MaytapiChannel;

use Illuminate\Notifications\Messages\MailMessage;
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

    public function send(bool $sendToGroup, ?string $phoneNumber, MailMessage $message): void
    {

        $messageData = $this->buildMessage($message);

        $response = Http::withHeaders([
            'x-maytapi-key' => $this->apiKey,
        ])->post("https://api.maytapi.com/api/{$this->productId}/{$this->phoneId}/sendMessage", [
            'to_number' => $sendToGroup ? $this->groupId : $phoneNumber,
            'type' => 'text',
            'message' => $messageData['text'],
        ]);

        Log::info('Response: '.$response->body());

    }

    private function buildMessage(MailMessage $message): array
    {
        $text = implode("\n\n", $message->introLines);
        $link = null;
        if ($message->actionText) {
            $link = $message->actionUrl;
            $text .= "\n\n".$message->actionUrl."\n(".$message->actionText.")\n\n";
        }
        $text .= implode("\n\n", $message->outroLines);

        return [
            'link' => $link,
            'text' => $text,
        ];

    }
}
