<?php


namespace TelegramWorkflow\Entity\Dto;


class OrderInfo extends BaseObject
{
    protected ?string          $name            = null;

    protected ?string          $phoneNumber     = null;

    protected ?string          $email           = null;

    protected ?ShippingAddress $shippingAddress = null;
}