<?php

namespace TelegramWorkflow\Middleware;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

class CheckHookMainTokenMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): CheckHookMainTokenMiddleware
    {
        $callbackToken = $container->get('config')['telegram']['main_bot']['callback_secret_token'];
        $logger = $container->get(LoggerInterface::class);

        return new CheckHookMainTokenMiddleware($callbackToken, $logger);
    }
}