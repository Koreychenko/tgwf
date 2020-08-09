<?php
declare(strict_types=1);

namespace TelegramWorkflow\Repository;

use InvalidArgumentException;
use TelegramWorkflow\Process\ProcessStepInterface;

class StepCollection
{
    private array $steps = [];

    public function __construct(array $steps)
    {
        if (count($steps) === 0) {
            throw new InvalidArgumentException('Steps array shouldn\'t be empty');
        }

        /* This is just a small array structure check */
        foreach ($steps as $stepName => $step) {
            if (!is_string($stepName)) {
                throw new InvalidArgumentException('Step name should be string');
            }

            if (!($step instanceof ProcessStepInterface)) {
                throw new InvalidArgumentException(sprintf('Step should implement %s', ProcessStepInterface::class));
            }
        }

        $this->steps = $steps;
    }

    public function getStep(string $stepName): ?ProcessStepInterface
    {
        if (array_key_exists($stepName, $this->steps)) {
            return $this->steps[$stepName];
        }

        return null;
    }

    public function getFirstStepName(): string
    {
        return array_keys($this->steps)[0];
    }

    public function getNextStepName(string $stepName): ?string
    {
        $stepNames = array_keys($this->steps);
        $currentStepIndex = array_search($stepName, $stepNames);

        if (array_key_exists($currentStepIndex + 1, $stepNames)) {
            return $stepNames[$currentStepIndex + 1];
        }

        return null;
    }
}