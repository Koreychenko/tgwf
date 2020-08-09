<?php

namespace TelegramWorkflow\Service;

interface MessageSenderInterface
{
    public function send(array $message);
}