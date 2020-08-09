<?php

namespace TelegramWorkflow\Repository;

use TelegramWorkflow\Entity\State;

interface StateRepositoryInterface
{
    public function delete(?State $state);

    public function getState(string $botId, int $chatId): State;

    public function flush();

    public function save(State $state): void;
}