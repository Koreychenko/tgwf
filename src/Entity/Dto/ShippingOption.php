<?php


namespace TelegramWorkflow\Entity\Dto;


class ShippingOption extends BaseObject
{
    protected ?string  $id    = null;

    protected ?string  $title = null;

    /** @var LabeledPrice[] */
    protected ?array $prices = null;
}