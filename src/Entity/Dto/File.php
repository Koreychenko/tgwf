<?php


namespace TelegramWorkflow\Entity\Dto;


class File extends BaseObject
{
    protected ?string     $fileId       = null;

    protected ?string     $fileUniqueId = null;

    protected ?PhotoSize  $thumb        = null;

    protected ?string     $fileName     = null;

    protected ?string     $mimeType     = null;

    protected ?int        $fileSize     = null;

    /**
     * @return string|null
     */
    public function getFileId(): ?string
    {
        return $this->fileId;
    }

    /**
     * @param string|null $fileId
     */
    public function setFileId(?string $fileId): void
    {
        $this->fileId = $fileId;
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    /**
     * @return string|null
     */
    public function getFileUniqueId(): ?string
    {
        return $this->fileUniqueId;
    }

    /**
     * @param string|null $fileUniqueId
     */
    public function setFileUniqueId(?string $fileUniqueId): void
    {
        $this->fileUniqueId = $fileUniqueId;
    }

    /**
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize|null $thumb
     */
    public function setThumb(?PhotoSize $thumb): void
    {
        $this->thumb = $thumb;
    }

    /**
     * @param string|null $fileName
     */
    public function setFileName(?string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @param string|null $mimeType
     */
    public function setMimeType(?string $mimeType): void
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @param int|null $fileSize
     */
    public function setFileSize(?int $fileSize): void
    {
        $this->fileSize = $fileSize;
    }
}