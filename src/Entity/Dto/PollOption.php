<?php


namespace TelegramWorkflow\Entity\Dto;


class PollOption extends BaseObject
{
    protected ?string $text       = null;

    protected ?int    $voterCount = null;
}