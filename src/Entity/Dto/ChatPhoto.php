<?php


namespace TelegramWorkflow\Entity\Dto;


class ChatPhoto extends BaseObject
{
    protected ?string $smallFileId       = null;

    protected ?string $smallFileUniqueId = null;

    protected ?string $bigFileId         = null;

    protected ?string $bigFileUniqueId   = null;
}