<?php


namespace TelegramWorkflow\Entity\Dto;


class ReplyKeyboardMarkup extends BaseObject
{
    protected ?array $keyboard        = null;

    protected ?bool  $resizeKeyboard  = null;

    protected ?bool  $oneTimeKeyboard = null;

    protected ?bool  $selective       = null;
}