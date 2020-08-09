<?php


namespace TelegramWorkflow\Entity\Dto;


class Game extends BaseObject
{
    protected ?string $title       = null;

    protected ?string $description = null;

    /** @var PhotoSize[] */
    protected ?array   $photo = null;

    protected ?string  $text  = null;

    /** @var MessageEntity[] */
    protected ?array      $textEntities = null;

    protected ?Animation  $animation    = null;
}