<?php


namespace TelegramWorkflow\Test\Assets\Steps;


use TelegramWorkflow\Entity\Action;
use TelegramWorkflow\Entity\State;
use TelegramWorkflow\Process\AbstractProcessStep;

class Bot1TestProcess2Step2 extends AbstractProcessStep
{
    public function executeStep(Action $action, ?State $state = null)
    {
        // TODO: Implement executeStep() method.
    }

    public function validate(Action $action): bool
    {
        // TODO: Implement validate() method.
    }
}