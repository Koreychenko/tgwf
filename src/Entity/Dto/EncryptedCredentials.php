<?php


namespace TelegramWorkflow\Entity\Dto;


class EncryptedCredentials extends BaseObject
{
    protected ?string $data   = null;

    protected ?string $hash   = null;

    protected ?string $secret = null;
}