<?php

namespace TelegramWorkflow\Entity;

class BotDatabaseObject
{
    protected string $token;

    protected string $chatId;

    protected string $adminChatId;

    public function __construct(string $token, string $chatId)
    {
        $this->token  = $token;
        $this->chatId = $chatId;
    }

    /**
     * @return string
     */
    public function getAdminChatId(): string
    {
        return $this->adminChatId;
    }

    /**
     * @return string
     */
    public function getChatId(): string
    {
        return $this->chatId;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}