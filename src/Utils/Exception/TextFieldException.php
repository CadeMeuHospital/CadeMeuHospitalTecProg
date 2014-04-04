<?php

/*  File: TextFieldException.php
    Description: TextField Expection Constructor
*/

class TextFieldException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
