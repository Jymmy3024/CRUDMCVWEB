<?php

class EntityNotFoundException extends Exception{
    public function __construct(int $code = 0, string $message = "",string  $throwable = null)
    {
        parent::__construct($message, $code, $throwable);
    }
}