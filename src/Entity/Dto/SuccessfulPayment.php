<?php


namespace TelegramWorkflow\Entity\Dto;


class SuccessfulPayment extends BaseObject
{
    protected ?string     $currency                = null;

    protected ?int        $totalAmount             = null;

    protected ?string     $invoicePayload          = null;

    protected ?string     $shippingOptionId        = null;

    protected ?OrderInfo  $orderInfo               = null;

    protected ?string     $telegramPaymentChargeId = null;

    protected ?string     $providerPaymentChargeId = null;
}