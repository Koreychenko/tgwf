<?php


namespace TelegramWorkflow\Entity\Dto;


class KeyboardButton extends BaseObject
{
    protected ?string                  $text            = null;

    protected ?bool                    $requestContact  = null;

    protected ?bool                    $requestLocation = null;

    protected ?KeyboardButtonPollType  $requestPoll     = null;
}