<?php

namespace TelegramWorkflow\Process;

use TelegramWorkflow\Entity\Action;
use TelegramWorkflow\Entity\State;

interface ProcessStepInterface
{
    public function setState(State $state);

    public function getState(): ?State;

    public function beforeStep();

    public function executeStep(Action $action);

    public function afterStep();

    public function validate(Action $action): bool;

    public function invalidActionResponse(Action $action);
}