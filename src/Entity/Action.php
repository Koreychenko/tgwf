<?php

namespace TelegramWorkflow\Entity;

use TelegramWorkflow\Entity\Dto\Chat;
use TelegramWorkflow\Entity\Dto\MessageEntity;
use TelegramWorkflow\Entity\Dto\Update;

class Action
{
    protected Update $update;

    public function __construct(Update $update)
    {
        $this->update = $update;
    }

    public function isMessage(): bool
    {
        if ($this->update->getMessage()) {
            return true;
        }

        return false;
    }

    public function isCallbackQuery(): bool
    {
        if ($this->update->getCallbackQuery()) {
            return true;
        }

        return false;
    }

    public function getCommands(): ?array
    {
        if (!$this->isMessage()) {
            return null;
        }

        $message = $this->update->getMessage();

        $entities = $message->getEntities();

        if (!$entities) {
            return null;
        }

        $commands = [];

        foreach ($entities as $entity) {
            if ($entity->getType() === MessageEntity::TYPE_BOT_COMMAND) {
                $commands[] = substr($message->getText(), $entity->getOffset() + 1, $entity->getLength());
            }
        }

        return empty($commands) ? null : $commands;
    }

    public function isDocument(): bool
    {
        if (!$this->isMessage()) {
            return false;
        }

        if ($this->update->getMessage()->getDocument()) {
            return true;
        }

        return false;
    }

    public function isPhoto(): bool
    {
        if (!$this->isMessage()) {
            return false;
        }

        if ($this->update->getMessage()->getPhoto()) {
            return true;
        }

        return false;
    }

    public function getChat(): ?Chat
    {
        if ($this->isMessage()) {
            return $this->update->getMessage()->getChat();
        }

        if ($this->isCallbackQuery()) {
            $message = $this->update->getCallbackQuery()->getMessage();
            if ($message) {
                return $message->getChat();
            }
        }

        return null;
    }
}