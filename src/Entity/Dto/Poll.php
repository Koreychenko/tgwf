<?php


namespace TelegramWorkflow\Entity\Dto;


class Poll extends BaseObject
{
    protected ?string $id       = null;

    protected ?string $question = null;

    /** @var PollOption[] */
    protected ?array   $options               = null;

    protected ?int     $totalVoterCount       = null;

    protected ?bool    $isClosed              = null;

    protected ?bool    $isAnonymous           = null;

    protected ?string  $type                  = null;

    protected ?bool    $allowsMultipleAnswers = null;

    protected ?int     $correctOptionId       = null;

    protected ?string  $explanation           = null;

    /** @var MessageEntity[] */
    protected ?array $explanationEntities = null;

    protected ?int   $openPeriod          = null;

    protected ?int   $closeDate           = null;
}