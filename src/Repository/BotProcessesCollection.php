<?php

namespace TelegramWorkflow\Repository;

use Psr\Container\ContainerInterface;
use TelegramWorkflow\Process\Process;

class BotProcessesCollection
{
    protected array $bots;
    protected ContainerInterface $container;

    public function __construct(array $config, ContainerInterface $container = null)
    {
        foreach ($config as $botName => $botProcesses) {
            $processes = [];

            foreach ($botProcesses as $processName => $processSteps) {
                $stepCollection = new StepCollection(array_map(function ($stepClass) use ($container) {
                    if ($container and $container->has($stepClass)) {
                        return $container->get($stepClass);
                    }

                    return new $stepClass;
                }, $processSteps));
                $processes[$processName] = new Process($stepCollection);
            }

            $this->bots[$botName] = new ProcessCollection($processes);
        }
    }

    public function getBotProcesses(string $botName): ?ProcessCollection {
        if (array_key_exists($botName, $this->bots)) {
            return $this->bots[$botName];
        }

        return null;
    }
}