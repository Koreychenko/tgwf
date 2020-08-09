<?php


namespace TelegramWorkflow\Entity\Dto;


class ShippingAddress extends BaseObject
{
    protected ?string $countryCode = null;

    protected ?string $state       = null;

    protected ?string $city        = null;

    protected ?string $streetLine1 = null;

    protected ?string $streetLine2 = null;

    protected ?string $postCode    = null;
}