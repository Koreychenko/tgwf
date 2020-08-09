<?php


namespace TelegramWorkflow\Entity\Dto;


class Video extends BaseObject
{
    protected ?string     $fileId       = null;

    protected ?string     $fileUniqueId = null;

    protected ?int        $width        = null;

    protected ?int        $height       = null;

    protected ?int        $duration     = null;

    protected ?PhotoSize  $thumb        = null;

    protected ?string     $mimeType     = null;

    protected ?int        $fileSize     = null;
}