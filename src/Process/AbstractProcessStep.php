<?php

namespace TelegramWorkflow\Process;

use TelegramWorkflow\Entity\Action;
use TelegramWorkflow\Entity\State;

abstract class AbstractProcessStep implements ProcessStepInterface
{
    protected ?State $state = null;

    public function setState(?State $state = null): void
    {
        $this->state = $state;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    public function beforeStep()
    {
        // TODO: Implement beforeStep() method.
    }

    abstract public function executeStep(Action $action);

    public function afterStep()
    {
        // TODO: Implement afterStep() method.
    }

    abstract public function validate(Action $action): bool;

    public function invalidActionResponse(Action $action)
    {
        // TODO: Implement invalidActionResponse() method.
    }
}