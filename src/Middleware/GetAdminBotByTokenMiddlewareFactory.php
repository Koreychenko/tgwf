<?php
declare(strict_types=1);

namespace TelegramWorkflow\Middleware;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use TelegramWorkflow\Repository\BotRepositoryInterface;

class GetAdminBotByTokenMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): GetAdminBotByTokenMiddleware
    {
        $logger = $container->get(LoggerInterface::class);
        $botRepository = $container->get(BotRepositoryInterface::class);

        return new GetAdminBotByTokenMiddleware($botRepository, $logger);
    }
}
