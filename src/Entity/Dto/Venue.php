<?php


namespace TelegramWorkflow\Entity\Dto;


class Venue extends BaseObject
{
    protected ?Location $location       = null;

    protected ?string   $title          = null;

    protected ?string   $address        = null;

    protected ?string   $foursquareId   = null;

    protected ?string   $foursquareType = null;
}