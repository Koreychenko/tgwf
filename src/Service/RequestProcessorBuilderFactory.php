<?php

namespace TelegramWorkflow\Service;

use Psr\Container\ContainerInterface;

class RequestProcessorBuilderFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        $requestProcessorBuilder = new RequestProcessorBuilder();

        if ($config['request_processors']) {
            foreach ($config['request_processors'] as $requestProcessor) {
                $requestProcessor = $container->get($requestProcessor);

                if (!($requestProcessor instanceof RequestProcessorInterface)) {
                    continue;
                }

                $requestProcessorBuilder->addProcessor($requestProcessor);
            }
        }

        return $requestProcessorBuilder;
    }
}