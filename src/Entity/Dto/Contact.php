<?php


namespace TelegramWorkflow\Entity\Dto;


class Contact extends BaseObject
{
    protected ?string  $phoneNumber = null;

    protected ?string  $firstName   = null;

    protected ?string  $lastName    = null;

    protected ?int     $userId      = null;

    protected ?string  $vcard       = null;
}