<?php

namespace TelegramWorkflow\Test\Assets\Steps;

use TelegramWorkflow\Entity\Action;
use TelegramWorkflow\Entity\Dto\Message;
use TelegramWorkflow\Entity\State;
use TelegramWorkflow\Process\AbstractProcessStep;

class Bot1TestProcess1Step1 extends AbstractProcessStep
{
    public function executeStep(Action $action, ?State $state = null)
    {
    }

    public function beforeStep()
    {
        return [new Message()];
    }

    public function afterStep()
    {
        return [new Message(), new Message()];
    }

    public function validate(Action $action): bool
    {
        return true;
    }
}