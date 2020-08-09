<?php


namespace TelegramWorkflow\Entity\Dto;


class MaskPosition extends BaseObject
{
    protected ?string $point  = null;

    protected ?float  $xShift = null;

    protected ?float  $yShift = null;

    protected ?float  $scale  = null;
}