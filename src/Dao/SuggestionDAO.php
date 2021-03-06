<?php

/*  File: SuggestionDAO.php
    Description: This class gets the data from the database and makes a object with the information.
*/

require_once '/../Utils/DataBaseConnection.php';
require_once '/../Utils/DataValidation.php';

class SuggestionDAO
{
    private static $instanceSuggestionDAO;

    private function __construct()
    {
    }

    //Singleton pattern
    public static function getInstanceSuggestionDAO()
    {
        if (!isset(self::$instanceSuggestionDAO)) {
            self::$instanceSuggestionDAO = new SuggestionDAO();
        }
        
        else {
            //Nothing to do
        }

        return self::$instanceSuggestionDAO;
    }

    //Saving a Suggestion from the user in DB
    public function saveSuggestionInDatabase($suggestion, $email)
    {
        DataValidation::throwTextFieldException($suggestion);
        DataValidation::validateEmail($email);

        $sql = "INSERT INTO suggestions (textSuggestions, emailUser) VALUES ('".$suggestion."', '".$email."')";

        return mysql_query($sql);
    }
}
