<?php


namespace TelegramWorkflow\Entity\Dto;


class Sticker extends BaseObject
{
    protected ?string        $fileId       = null;

    protected ?string        $fileUniqueId = null;

    protected ?int           $width        = null;

    protected ?int           $height       = null;

    protected ?bool          $isAnimated   = null;

    protected ?PhotoSize     $thumb        = null;

    protected ?string        $emoji        = null;

    protected ?string        $setName      = null;

    protected ?MaskPosition  $maskPosition = null;

    protected ?int           $fileSize     = null;
}