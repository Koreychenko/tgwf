<?php

namespace TelegramWorkflow\Service;

use TelegramWorkflow\Entity\Update;

interface RequestProcessorInterface
{
    public function checkMatch(Update $update): bool;

    public function process(Update $update): ?array;
}