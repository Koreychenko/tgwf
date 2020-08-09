<?php

namespace TelegramWorkflow\Entity;

use TelegramWorkflow\Service\ParameterTrait;

class State
{
    use ParameterTrait;

    protected string $process;

    protected string $processStep;

    public function __construct(string $process, string $processStep)
    {
        $this->process     = $process;
        $this->processStep = $processStep;
        $this->parameters  = [];
    }

    public function setProcessStep(string $processStep): void
    {
        $this->processStep = $processStep;
    }

    /**
     * @return string
     */
    public function getProcessName(): string
    {
        return $this->process;
    }

    /**
     * @return string
     */
    public function getProcessStepName(): string
    {
        return $this->processStep;
    }
}