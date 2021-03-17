<?php

namespace App\Dto;

use App\Interfaces\DtoInterface;

class BaseDto implements DtoInterface
{

    /**
     * User ID
     *
     * @var int
     */
    public $userId;

    /**
     * List of errors.
     *
     * @var array
     */
    public $errors = [];

    /**
     * List of messages.
     *
     * @var array
     */
    public $messages = [];

    /**
     * Get user ID
     *
     * @return  int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Set user ID
     *
     * @param  int  $userId  User ID
     *
     * @return  self
     */
    public function setUserId(): self
    {
        $this->userId = auth()->id();

        return $this;
    }

    /**
     * Get list of errors.
     *
     * @return  array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Set list of errors.
     *
     * @param  array  $errors  List of errors.
     *
     * @return  self
     */
    public function setErrors(string $errors): self
    {
        $this->errors[] = $errors;

        return $this;
    }

    /**
     * Get list of messages.
     *
     * @return  array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * Set list of messages.
     *
     * @param  string message.
     *
     * @return  self
     */
    public function setMessages(string $messages): self
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Convert all errors to <ul> <li> string
     *
     * @param DtoInterface $dto
     * @return string
     */
    public function listErrors(DtoInterface $dto): string
    {
        if (empty($dto->getErrors())) return '';

        return "<ul><li>" . implode("</li><li>", $dto->getErrors()) . "</li></ul>";
    }

    /**
     * Convert all messages to <ul> <li> string
     *
     * @param DtoInterface $dto
     * @return string
     */
    public function listMessages(DtoInterface $dto): string
    {
        if (empty($dto->getMessages())) return '';

        return "<ul><li>" . implode("</li><li>", $dto->getMessages()) . "</li></ul>";
    }
}
