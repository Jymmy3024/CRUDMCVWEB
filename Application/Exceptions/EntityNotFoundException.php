<?php

class EntityNotFoundException extends Exception{
    public function __construct( string $message = "",$code = 0, Throwable  $throwable = null)
    {
        parent::__construct ($message,$code, $throwable);
    }
}