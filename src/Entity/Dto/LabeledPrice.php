<?php


namespace TelegramWorkflow\Entity\Dto;


class LabeledPrice extends BaseObject
{
    protected ?string $label  = null;

    protected ?int    $amount = null;
}