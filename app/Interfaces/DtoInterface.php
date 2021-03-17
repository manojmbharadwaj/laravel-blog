<?php

namespace App\Interfaces;

interface DtoInterface
{

    /**
     * Set Errors
     *
     * @return self
     */
    function setErrors(string $error): self;

    /**
     * Get List of all errors
     *
     * @return array
     */
    function getErrors(): array;

    /**
     * Set Messages
     *
     * @return self
     */
    function setMessages(string $message): self;

    /**
     * Get List of Messages
     *
     * @return array
     */
    function getMessages(): array;

    /**
     * Construct <ul> </li> of all the errors
     * @param DtoInterface $dto
     * @return string
     */
    function listErrors(DtoInterface $dto): string;

    /**
     * Construct <ul> </li> of all the messages
     *
     * @param DtoInterface $dto
     * @return string
     */
    function listMessages(DtoInterface $dto): string;
}
