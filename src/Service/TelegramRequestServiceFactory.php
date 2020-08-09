<?php

namespace TelegramWorkflow\Service;

use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;

class TelegramRequestServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $httpClient = new Client(
            [
                'base_uri' => 'https://api.telegram.org',
                'headers' => [
                    'Content-Type: application/json'
                ]
            ]
        );

        return new TelegramRequestService($httpClient);
    }
}