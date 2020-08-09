<?php


namespace TelegramWorkflow\Entity\Dto;


class Audio extends BaseObject
{
    protected ?string     $fileId       = null;

    protected ?string     $fileUniqueId = null;

    protected ?int        $duration     = null;

    protected ?string     $performer    = null;

    protected ?string     $title        = null;

    protected ?string     $mimeType     = null;

    protected ?int        $fileSize     = null;

    protected ?PhotoSize  $thumb        = null;
}