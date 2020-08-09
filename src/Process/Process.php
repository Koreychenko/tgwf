<?php

namespace TelegramWorkflow\Process;

use InvalidArgumentException;
use TelegramWorkflow\Entity\Action;
use TelegramWorkflow\Entity\Dto\Message;
use TelegramWorkflow\Entity\State;
use TelegramWorkflow\Repository\StateRepositoryInterface;
use TelegramWorkflow\Repository\StepCollection;

class Process
{
    protected StepCollection $stepCollection;

    protected StateRepositoryInterface $stateRepository;

    protected ?string $currentStep = null;

    protected string $processName;

    /**
     * @var Message[] $messages
     */
    protected array $messages = [];

    public function __construct(StepCollection $stepCollection, string $processName = '')
    {
        $this->stepCollection = $stepCollection;
        $this->processName    = $processName;
    }

    /**
     * @return Message[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param StateRepositoryInterface $stateRepository
     */
    public function setStateRepository(StateRepositoryInterface $stateRepository): void
    {
        $this->stateRepository = $stateRepository;
    }

    private function addMessage($messages = null): void
    {
        if (!$messages) {
            return;
        }

        if (!is_array($messages)) {
            $messages = [$messages];
        }

        foreach ($messages as $message) {
            if (!($message instanceof Message)) {
                throw new InvalidArgumentException(sprintf('Argument should be of type %s', Message::class));
            }
        }

        $this->messages = array_merge($this->messages, $messages);
    }

    public function setCurrentStep(string $stepName)
    {
        if (!$this->stepCollection->getStep($stepName)) {
            throw new InvalidArgumentException(sprintf('Step with name %s doesn\'t exist in the process %s', $stepName, get_class($this)));
        }

        $this->currentStep = $stepName;
    }

    public function validate(Action $action)
    {
        $step = $this->getCurrentStep();

        return $step->validate($action);
    }

    private function getCurrentStep(): ?ProcessStepInterface
    {
        if (!$this->currentStep) {
            $this->setFirstStep();
        }

        return $this->stepCollection->getStep($this->currentStep);
    }

    private function setFirstStep(): void
    {
        $this->currentStep = $this->stepCollection->getFirstStepName();
    }

    private function getNextStep(): ?ProcessStepInterface
    {
        $nextStepName = $this->stepCollection->getNextStepName($this->currentStep);

        if ($nextStepName) {
            return $this->stepCollection->getStep($nextStepName);
        }

        return null;
    }

    final public function execute(Action $action, ?State $state = null): void
    {
        $currentStep = $this->getCurrentStep();

        if (!$currentStep) {
            return;
        }

        /**
         * If there is no state, then it means this is the very first step of the process and we have to try execute before step
         */
        if (!$state) {
            $this->addMessage($currentStep->beforeStep());

            $state = new State($this->processName, $this->currentStep);

            $this->stateRepository->save($state);

            return;
        }

        $currentStep->setState($state);

        if (!$currentStep->validate($action)) {
            $this->addMessage($currentStep->invalidActionResponse($action));

            return;
        }

        $this->addMessage($currentStep->executeStep($action));
        $this->addMessage($currentStep->afterStep());

        $state = $currentStep->getState();

        /** Execute next step before action if it exists */
        $nextStep = $this->getNextStep();

        if ($nextStep) {
            $state->setProcessStep($this->stepCollection->getNextStepName($this->currentStep));
            $this->stateRepository->save($state);

            $this->addMessage($nextStep->beforeStep());
        } else {
            $this->stateRepository->delete($state);
        }
    }
}