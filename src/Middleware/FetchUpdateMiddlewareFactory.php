<?php

namespace TelegramWorkflow\Middleware;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\FormFactoryInterface;

class FetchUpdateMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): FetchUpdateMiddleware
    {
        $formFactory = $container->get(FormFactoryInterface::class);
        $logger      = $container->get(LoggerInterface::class);
        $mainBot = $container->get('MainBot');

        return new FetchUpdateMiddleware($formFactory, $logger, $mainBot);
    }
}