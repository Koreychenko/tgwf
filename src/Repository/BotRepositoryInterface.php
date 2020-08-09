<?php

namespace TelegramWorkflow\Repository;

use TelegramWorkflow\Service\BotInterface;

interface BotRepositoryInterface
{
    public function getClientBotByToken(string $token, string $chatId): ?BotInterface;

    public function getAdminBotByChatId(string $chatId): ?BotInterface;

    public function getInfoBot(): ?BotInterface;
}