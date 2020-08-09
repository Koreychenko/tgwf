<?php

namespace TelegramWorkflow\Service;

use TelegramWorkflow\Entity\Action;

class Bot implements BotInterface
{
    /**
     * Unique bot identifier among other bots in the system. E.g. adminBot, userBot
     *
     * @var string
     */
    protected string $botId;

    /**
     * Token to access Telegram API
     *
     * @var string
     */
    protected string $botToken;

    protected MessageSenderInterface $messageSender;

    /** @var RequestProcessor */
    protected RequestProcessor $requestProcessor;

    public function __construct(string $botId, string $botToken, MessageSenderInterface $messageSender, RequestProcessor $requestProcessor)
    {
        $this->botId         = $botId;
        $this->botToken      = $botToken;
        $this->messageSender = $messageSender;
        $this->requestProcessor = $requestProcessor;
    }

    /**
     * Handle incoming request
     */
    public function handle(Action $action) {
        $messages = $this->requestProcessor->handle($action);

        if ($messages) {
            $this->send($messages);
        }
    }

    public function send(array $messages): void
    {
        $this->messageSender->send($messages);
    }
}