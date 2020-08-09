<?php


namespace TelegramWorkflow\Entity\Dto;


class CallbackQuery extends BaseObject
{
    protected ?string   $id              = null;

    protected ?User     $from            = null;

    protected ?Message  $message         = null;

    protected ?string   $inlineMessageId = null;

    protected ?string   $chatInstance    = null;

    protected ?string   $data            = null;

    protected ?string   $gameShortName   = null;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return User|null
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * @param User|null $from
     */
    public function setFrom(?User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return Message|null
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    /**
     * @param Message|null $message
     */
    public function setMessage(?Message $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string|null $inlineMessageId
     */
    public function setInlineMessageId(?string $inlineMessageId): void
    {
        $this->inlineMessageId = $inlineMessageId;
    }

    /**
     * @return string|null
     */
    public function getChatInstance(): ?string
    {
        return $this->chatInstance;
    }

    /**
     * @param string|null $chatInstance
     */
    public function setChatInstance(?string $chatInstance): void
    {
        $this->chatInstance = $chatInstance;
    }

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string|null $data
     */
    public function setData(?string $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string|null
     */
    public function getGameShortName(): ?string
    {
        return $this->gameShortName;
    }

    /**
     * @param string|null $gameShortName
     */
    public function setGameShortName(?string $gameShortName): void
    {
        $this->gameShortName = $gameShortName;
    }


}