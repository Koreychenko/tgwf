<?php

namespace TelegramWorkflow\Test\Service;

use Exception;
use PHPUnit\Framework\TestCase;
use TelegramWorkflow\Repository\BotProcessesCollection;
use TelegramWorkflow\Repository\StateRepositoryInterface;
use TelegramWorkflow\Service\Bot;
use TelegramWorkflow\Service\MessageSenderInterface;
use TelegramWorkflow\Service\RequestProcessor;

abstract class AbstractProcessBotTest extends TestCase
{
    protected string $botName;
    protected string $botToken = '';
    protected RequestProcessor $requestProcessor;
    protected Bot $bot;
    protected StateRepositoryInterface $stateRepository;

    protected function setUp(): void
    {
        $config = require(__DIR__ . '/../Assets/process.config.php');
        $botProcessCollection = new BotProcessesCollection($config);

        $processCollection = $botProcessCollection->getBotProcesses($this->botName);

        if (!$processCollection) {
            throw new Exception('Invalid bot name for testing');
        }

        $messageSender = $this->createMock(MessageSenderInterface::class);

        $this->stateRepository = $this->createMock(StateRepositoryInterface::class);

        $this->requestProcessor = new RequestProcessor($this->botName, $processCollection, $this->stateRepository);

        $this->bot = new Bot(
            $this->botName,
            $this->botToken,
            $messageSender,
            $this->requestProcessor
        );
    }
}