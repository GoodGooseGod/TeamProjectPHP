<?php

namespace Teletype\Sdk\Exceptions;

class TeletypeException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct("[Teletype SDK] $message", $code, $previous);
    }
}