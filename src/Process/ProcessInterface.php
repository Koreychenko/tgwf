<?php

namespace TelegramWorkflow\Process;

use TelegramWorkflow\Entity\Action;
use TelegramWorkflow\Entity\State;

interface ProcessInterface
{
    public function validateAction(State $state, Action $action): bool;

    public function executeAction(State $state, Action $action): State;
}