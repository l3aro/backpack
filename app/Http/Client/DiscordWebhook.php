<?php

namespace App\Http\Client;

use Illuminate\Support\Facades\Http;

class DiscordWebhook
{
    public function __construct(
        public string $hookUrl,
        public string $message,
        public array $options = []
    ) {
        //
    }

    public static function make(
        string $hookUrl,
        string $message,
        array $options = []
    ): self {
        return new self($hookUrl, $message, $options);
    }

    public function send(): void
    {
        $options = array_merge([
            'content' => $this->message,
        ], [
            'http_errors' => false,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ], $this->options);

        Http::post($this->hookUrl, $options);
    }
}
