<?php

/*  File: EmailException.php
    Description: 
*/

class EmailException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
