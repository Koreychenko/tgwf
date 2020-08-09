<?php


namespace TelegramWorkflow\Entity\Dto;


class ChatPermissions extends BaseObject
{
    protected ?bool $canSendMessages       = null;

    protected ?bool $canSendMediaMessages  = null;

    protected ?bool $canSendPolls          = null;

    protected ?bool $canSendOtherMessages  = null;

    protected ?bool $canAddWebPagePreviews = null;

    protected ?bool $canChangeInfo         = null;

    protected ?bool $canInviteUsers        = null;

    protected ?bool $canPinMessages        = null;
}