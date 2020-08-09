<?php

namespace TelegramWorkflow\Repository;

use TelegramWorkflow\Entity\BotDatabaseObject;

class DatabaseBotRepository
{
    public function getAdminBotByChatId(string $chatId): ?BotDatabaseObject
    {
        return null;
    }

    public function getClientBotByToken(string $token): ?BotDatabaseObject
    {
        return null;
    }
}