<?php

namespace TelegramWorkflow\Service;

use GuzzleHttp\Client;
use InvalidArgumentException;

class TelegramRequestService
{
    protected Client $httpClient;
    protected ?string $botToken = null;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function request(string $methodName, array $parameters = null)
    {
        if (!$this->botToken) {
            throw new InvalidArgumentException('Bot token is undefined');
        }

        $url = urlencode($this->botToken) . '/' . $methodName;

        $response = $this->httpClient->post($url, [
            'json' => $parameters
        ]);
    }

    /**
     * @param string $botToken
     */
    public function setBotToken(string $botToken): void
    {
        $this->botToken = 'bot' . $botToken;
    }
}