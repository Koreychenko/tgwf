<?php


namespace TelegramWorkflow\Entity\Dto;


class PollAnswer extends BaseObject
{
    protected ?string $pollId = null;

    protected ?User   $user   = null;

    /** @var int[] */
    protected ?array $optionIds = null;
}