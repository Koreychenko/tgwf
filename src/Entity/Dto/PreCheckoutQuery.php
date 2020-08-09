<?php


namespace TelegramWorkflow\Entity\Dto;


class PreCheckoutQuery extends BaseObject
{
    protected ?string     $id               = null;

    protected ?User       $from             = null;

    protected ?string     $currency         = null;

    protected ?int        $totalAmount      = null;

    protected ?string     $invoicePayload   = null;

    protected ?string     $shippingOptionId = null;

    protected ?OrderInfo  $orderInfo        = null;
}