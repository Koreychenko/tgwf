<?php


namespace TelegramWorkflow\Entity\Dto;


class ReplyKeyboardRemove extends BaseObject
{
    protected ?bool  $removeKeyboard = null;

    protected ?bool  $selective      = null;
}