<?php

/*  File: ControllerSuggestion.php
    Description: Receives the information from SuggestionDao.php and makes an object with the information.
*/

require_once '/../Dao/SuggestionDAO.php';

class ControllerSuggestion
{
    private static $instanceControllerSuggestion;

    private function __construct()
    {
    }

    //Singleton pattern
    public static function getInstanceControllerSuggestion()
    {
        if (!isset(self::$instanceControllerSuggestion)) {
            self::$instanceControllerSuggestion = new ControllerSuggestion();
        }
        
        else {
            //Nothing to do
        }

        return self::$instanceControllerSuggestion;
    }

    //Saves User suggestion on BD
    public function saveSuggestion($suggestion, $email)
    {
        $suggestionDAO = SuggestionDAO::getInstanceSuggestionDAO();
        try {
            $result = $suggestionDAO->saveSuggestionInDatabase($suggestion, $email);

            return $result;
        } catch (TextFieldException $exception) {
            print "<script>alert('".$exception->getMessage()."')</script>";
            print "<script>window.location='../View/Contact.php'</script>";
        } catch (EmailException $exception) {
            print "<script>alert('".$exception->getMessage()."')</script>";
            print "<script>window.location='../View/Contact.php'</script>";
        }
    }

}
