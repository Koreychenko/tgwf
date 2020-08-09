<?php


namespace TelegramWorkflow\Entity\Dto;


class PassportFile extends BaseObject
{
    protected ?string $fileId       = null;

    protected ?string $fileUniqueId = null;

    protected ?int    $fileSize     = null;

    protected ?int    $fileDate     = null;
}