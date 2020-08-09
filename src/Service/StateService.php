<?php

namespace TelegramWorkflow\Service;

use Exception;
use TelegramWorkflow\Entity\Action;
use TelegramWorkflow\Entity\State;
use TelegramWorkflow\Process\ProcessInterface;

class StateService
{
    protected State $state;

    /** @var ProcessInterface[] */
    protected array $processes = [];

    protected ?ProcessInterface $currentProcess = null;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    public function addProcess(ProcessInterface $process): void
    {
        $this->processes[] = $process;
    }

    public function validateAction(Action $action)
    {
        $process = $this->getProcess();

        if (!$process) {
            throw new Exception('Invalid state active process');
        }

        return $process->validateAction($this->state, $action);
    }

    public function execute(Action $action)
    {
        $this->currentProcess->executeAction($this->state, $action);
    }

    protected function getProcess(): ?ProcessInterface
    {
        if (!$this->currentProcess) {
            /** @var ProcessInterface $process */
            foreach ($this->processes as $process) {
                if ($this->state->getProcessName() === get_class($process)) {
                    $this->currentProcess = $process;

                    break;
                }
            }
        }

        return $this->currentProcess;
    }
}