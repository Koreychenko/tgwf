<?php


namespace TelegramWorkflow\Entity\Dto;


class Invoice extends BaseObject
{
    protected ?string $title          = null;

    protected ?string $description    = null;

    protected ?string $startParameter = null;

    protected ?string $currency       = null;

    protected ?int    $totalAmount    = null;
}