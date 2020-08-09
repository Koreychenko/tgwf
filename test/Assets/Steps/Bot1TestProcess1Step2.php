<?php


namespace TelegramWorkflow\Test\Assets\Steps;


use TelegramWorkflow\Entity\Action;
use TelegramWorkflow\Entity\Dto\Message;
use TelegramWorkflow\Entity\State;
use TelegramWorkflow\Process\AbstractProcessStep;

class Bot1TestProcess1Step2 extends AbstractProcessStep
{
    public function beforeStep()
    {
        return new Message();
    }

    public function executeStep(Action $action, ?State $state = null)
    {
        // TODO: Implement executeStep() method.
    }

    public function validate(Action $action): bool
    {
        return true;
    }
}