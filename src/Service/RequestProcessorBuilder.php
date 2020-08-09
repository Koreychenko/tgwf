<?php

namespace TelegramWorkflow\Service;

use TelegramWorkflow\Entity\Update;

class RequestProcessorBuilder
{
    /** @var RequestProcessorInterface[] */
    protected array $processors = [];

    public function addProcessor(RequestProcessorInterface $requestProcessor): void
    {
        $this->processors[] = $requestProcessor;
    }

    public function getProcessor(Update $update): ?RequestProcessorInterface
    {
        foreach ($this->processors as $processor) {
            if ($processor->checkMatch($update)) {
                return $processor;
            }
        }

        return null;
    }
}