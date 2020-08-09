<?php


namespace TelegramWorkflow\Entity\Dto;


class LoginUrl extends BaseObject
{
    protected ?string  $url                = null;

    protected ?string  $forwardText        = null;

    protected ?string  $botUsername        = null;

    protected ?bool    $requestWriteAccess = null;
}