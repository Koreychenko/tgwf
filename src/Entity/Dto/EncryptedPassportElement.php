<?php


namespace TelegramWorkflow\Entity\Dto;


class EncryptedPassportElement extends BaseObject
{
    protected ?string  $type        = null;

    protected ?string  $data        = null;

    protected ?string  $phoneNumber = null;

    protected ?string  $email       = null;

    /** @var PassportFile[] */
    protected ?array        $files       = null;

    protected ?PassportFile $frontSide   = null;

    protected ?PassportFile $reverseSide = null;

    protected ?PassportFile $selfie      = null;

    /** @var PassportFile[] */
    protected ?array  $translation = null;

    protected ?string $hash        = null;
}