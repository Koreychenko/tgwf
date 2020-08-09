<?php


namespace TelegramWorkflow\Entity\Dto;


class ChosenInlineResult extends BaseObject
{
    protected ?string     $resultId        = null;

    protected ?User       $from            = null;

    protected ?Location   $location        = null;

    protected ?string     $inlineMessageId = null;

    protected ?string     $query           = null;
}