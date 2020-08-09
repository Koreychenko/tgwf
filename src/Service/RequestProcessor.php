<?php

namespace TelegramWorkflow\Service;

use TelegramWorkflow\Entity\Action;
use TelegramWorkflow\Entity\Dto\Message;
use TelegramWorkflow\Entity\State;
use TelegramWorkflow\Process\Process;
use TelegramWorkflow\Repository\ProcessCollection;
use TelegramWorkflow\Repository\StateRepositoryInterface;

class RequestProcessor
{
    protected string $botId;

    protected ProcessCollection $processCollection;

    protected StateRepositoryInterface $stateRepository;

    public function __construct(string $botId, ProcessCollection $processCollection, StateRepositoryInterface $stateRepository)
    {
        $this->botId             = $botId;
        $this->processCollection = $processCollection;
        $this->stateRepository   = $stateRepository;
    }

    /**
     * @param Action $action
     * @return Message[]
     */
    public function handle(Action $action): ?array
    {
        $state = $this->getStateFromAction($action);
        $process = null;

        if ($state) {
            $process = $this->getProcessFromState($state);
        }

        if (!$process) {
            $process = $this->getProcessByAction($action);
        }

        if ($process) {
            $process->setStateRepository($this->stateRepository);
            $process->execute($action, $state);

            return $process->getMessages();
        }

        $this->stateRepository->flush();

        return null;
    }

    private function getProcessFromState(State $state): ?Process
    {
        $process = $this->processCollection->getItem($state->getProcessName());

        if (!$process) {
            return null;
        }

        $process->setCurrentStep($state->getProcessStepName());

        return $process;
    }

    private function getProcessByAction(Action $action): ?Process
    {
        /** @var Process $process */
        foreach ($this->processCollection as $process) {
            if ($process->validate($action)) {
                return $process;
            }
        }

        return null;
    }

    private function getStateFromAction(Action $action): ?State
    {
        $chat = $action->getChat();

        if (!$chat) {
            return null;
        }

        return $this->stateRepository->getState($this->botId, $chat->getId());
    }
}