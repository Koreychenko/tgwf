<?php

namespace TelegramWorkflow\Service;

use TelegramWorkflow\Entity\Action;

interface BotInterface
{
    public function handle(Action $action);

    public function send(array $message);
}