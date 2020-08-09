<?php


namespace TelegramWorkflow\Entity\Dto;


class Message extends BaseObject
{
    protected ?int                   $messageId = null;

    protected ?User                  $from      = null;

    protected ?int                   $date      = null;

    protected ?Chat                  $chat      = null;

    protected ?string                $text      = null;

    /** @var MessageEntity[] */
    protected ?array                $entities = null;

    protected ?Document             $document = null;

    /** @var PhotoSize[] */
    protected ?array                $photo    = null;

    protected ?Contact              $contact  = null;

    protected ?Location             $location = null;

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @param MessageEntity[] $entities
     */
    public function setEntities(array $entities): void
    {
        $this->entities = $entities;
    }

    /**
     * @param Document|null $document
     */
    public function setDocument(?Document $document): void
    {
        $this->document = $document;
    }

    /**
     * @param PhotoSize[] $photo
     */
    public function setPhoto(array $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return Chat|null
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact|null $contact
     */
    public function setContact(?Contact $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return int|null
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * @param int|null $date
     */
    public function setDate(?int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * @return MessageEntity[]
     */
    public function getEntities(): ?array
    {
        return $this->entities;
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
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     */
    public function setLocation(?Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return int|null
     */
    public function getMessageId(): ?int
    {
        return $this->messageId;
    }

    /**
     * @param int|null $messageId
     */
    public function setMessageId(?int $messageId): void
    {
        $this->messageId = $messageId;
    }

    /**
     * @return PhotoSize[]
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param Chat|null $chat
     */
    public function setChat(?Chat $chat): void
    {
        $this->chat = $chat;
    }
}