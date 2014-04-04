<?php

/*  File: EmailException.php
    Description: Email Exception Constructor
*/

class EmailException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
