<?php

namespace TelegramWorkflow\Entity\Dto;

class InlineQuery extends BaseObject
{
    protected ?string    $id       = null;

    protected ?User      $from     = null;

    protected ?Location  $location = null;

    protected ?string    $query    = null;

    protected ?string    $offset   = null;
}