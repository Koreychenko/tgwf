<?php


namespace TelegramWorkflow\Entity\Dto;


class ShippingQuery extends BaseObject
{
    protected ?string          $id              = null;

    protected ?User            $from            = null;

    protected ?string          $invoicePayload  = null;

    protected ?ShippingAddress $shippingAddress = null;
}