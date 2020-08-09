<?php

namespace TelegramWorkflow\Entity\Dto;

class Update extends BaseObject
{
    protected ?int                $updateId           = null;

    protected ?Message            $message            = null;

    protected ?CallbackQuery      $callbackQuery      = null;

    /**
     * @param Message|null $message
     */
    public function setMessage(?Message $message): void
    {
        $this->message = $message;
    }

    /**
     * @param CallbackQuery|null $callbackQuery
     */
    public function setCallbackQuery(?CallbackQuery $callbackQuery): void
    {
        $this->callbackQuery = $callbackQuery;
    }

    /**
     * @return int|null
     */
    public function getUpdateId(): ?int
    {
        return $this->updateId;
    }

    /**
     * @param int|null $updateId
     */
    public function setUpdateId(?int $updateId): void
    {
        $this->updateId = $updateId;
    }

    public function __construct(?int $updateId = null, ?Message $message= null, ?CallbackQuery $callbackQuery = null)
    {
        $this->updateId      = $updateId;
        $this->message       = $message;
        $this->callbackQuery = $callbackQuery;
    }

    /**
     * @return CallbackQuery|null
     */
    public function getCallbackQuery(): ?CallbackQuery
    {
        return $this->callbackQuery;
    }

    /**
     * @return Message|null
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }
}