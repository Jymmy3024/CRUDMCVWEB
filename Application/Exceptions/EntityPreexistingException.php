<?php

class EntityPreexistingException extends Exception{
    public function __construct($message = "", $code = 0, Throwable $throwable = null) {
        parent::__construct($message, $code, $throwable);
    }
}