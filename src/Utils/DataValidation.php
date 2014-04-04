<?php

/*  File: DataValidation.php
    Description: Class responsible for all the validation on the text fields.
*/

require_once '/../Utils/Exception/TextFieldException.php';
require_once '/../Utils/Exception/EmailException.php';

define('SIZECODMUNIC', 6);

class DataValidation
{
    //Cheking if text field camp is null or less than 2 characters
    public static function throwTextFieldException($textField)
    {
        $result = FALSE;

        if (self::validateNullFields($textField)) {
            throw new TextFieldException("Campo não pode ser nulo!");
        } elseif (self::validateTextField($textField) == 1) {
            throw new TextFieldException("Campo contém caracteres invalidos!");
        } elseif (self::validateTextFieldLessThan2Characters($textField)) {
            throw new TextFieldException("Campo não pode ter menos de dois caracteres!");
        } else {
            $result = TRUE;
        }

        return $result;
    }

    //Checking if text field is less than 2 characters
    public static function validateTextFieldLessThan2Characters($textField)
    {
        $textFieldLenght = strlen($textField);
        if ($textFieldLenght < 2) {
            return TRUE;
        }

        return FALSE;
    }

    //Checking if the email is valid
    public function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new EmailException("E-mail inválido!");
        } else {
            return TRUE;
        }
    }

    //Checking if field is empty
    public static function validateNullFields($parameter)
    {
        $result = empty($parameter);

        return $result;
    }

    //Checking if text field use only valid characters
    public static function validateTextField($name)
    {
        $result = 0;
        $validChars = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù0123456789';

        $lengthName = strlen($name);

        for ($i = 0; $i < $lengthName; $i++) {
            $character = stripos($validChars, $name[$i]);
            if (!$character) {
                $result = 1;
            }
        }

        return $result;
    }

}
