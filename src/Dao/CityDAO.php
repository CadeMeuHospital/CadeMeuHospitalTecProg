<?php

/*  File: CityDAO.php
    Description: This class gets the data from the database and makes an object with the information.
*/

require_once '/../Utils/DataBaseConnection.php';

class CityDAO
{
    private static $instanceCityDAO;

    private function __construct()
    {
    }

    //Singleton pattern
    public static function getInstanceCityDAO()
    {
        if (!isset(self::$instanceCityDAO)) {
            self::$instanceCityDAO = new CityDAO();
        }

        return self::$instanceCityDAO;
    }

    //Taking a ciy in Data Base
    public function takeCityDatabase($codeCounty)
    {
        $querySelCity = "SELECT (municipio) FROM municipios_ibge
            WHERE codigo = '".$codeCounty."'";
        $selCity = mysql_query($querySelCity);
        $resultCity = mysql_fetch_row($selCity);

        return $resultCity;
    }
}
