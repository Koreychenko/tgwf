<?php


namespace TelegramWorkflow\Entity\Dto;


class PassportData extends BaseObject
{
    /** @var EncryptedPassportElement[] */
    protected ?array                $data        = null;

    protected ?EncryptedCredentials $credentials = null;
}