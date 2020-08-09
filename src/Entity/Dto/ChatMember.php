<?php


namespace TelegramWorkflow\Entity\Dto;


class ChatMember extends BaseObject
{
    protected ?User    $user                  = null;

    protected ?string  $status                = null;

    protected ?string  $customTitle           = null;

    protected ?int     $untilDate             = null;

    protected ?bool    $canBeEdited           = null;

    protected ?bool    $canPostMessages       = null;

    protected ?bool    $canEditMessages       = null;

    protected ?bool    $canDeleteMessages     = null;

    protected ?bool    $canRestrictMembers    = null;

    protected ?bool    $canPromoteMembers     = null;

    protected ?bool    $canChangeInfo         = null;

    protected ?bool    $canInviteUsers        = null;

    protected ?bool    $canPinMessages        = null;

    protected ?bool    $isMember              = null;

    protected ?bool    $canSendMessages       = null;

    protected ?bool    $canSendMediaMessages  = null;

    protected ?bool    $canSendPolls          = null;

    protected ?bool    $canSendOtherMessages  = null;

    protected ?bool    $canAddWebPagePreviews = null;
}