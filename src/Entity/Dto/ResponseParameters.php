<?php


namespace TelegramWorkflow\Entity\Dto;


class ResponseParameters extends BaseObject
{
    protected ?int $migrateToChatId = null;

    protected ?int $retryAfter      = null;
}