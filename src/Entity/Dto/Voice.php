<?php


namespace TelegramWorkflow\Entity\Dto;


class Voice extends BaseObject
{
    protected ?string  $fileId       = null;

    protected ?string  $fileUniqueId = null;

    protected ?int     $duration     = null;

    protected ?string  $mimeType     = null;

    protected ?int     $fileSize     = null;
}