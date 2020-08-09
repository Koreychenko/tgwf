<?php


namespace TelegramWorkflow\Entity\Dto;


class InlineKeyboardButton extends BaseObject
{
    protected ?string        $text                         = null;

    protected ?string        $url                          = null;

    protected ?LoginUrl      $loginUrl                     = null;

    protected ?string        $callbackData                 = null;

    protected ?string        $switchInlineQuery            = null;

    protected ?string        $switchInlineQueryCurrentChat = null;

    protected ?CallbackGame  $callbackGame                 = null;

    protected ?bool          $pay                          = null;
}