<?php


namespace TelegramWorkflow\Entity\Dto;


class VideoNote extends BaseObject
{
    protected ?string     $fileId       = null;

    protected ?string     $fileUniqueId = null;

    protected ?int        $length       = null;

    protected ?int        $duration     = null;

    protected ?PhotoSize  $thumb        = null;

    protected ?int        $fileSize     = null;
}