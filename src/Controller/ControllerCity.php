<?php

/*  File: ControllerCity.php
    Description: Receives the information from CityDao.php and makes an object with the information.
*/
    
require_once '/../Dao/CityDAO.php';
require_once '/../Model/City.php';

class ControllerCity
{
    private static $instanceControllerCity;

    private function __construct()
    {
    }

    //Singleton pattern
    public static function getInstanceControllerCity()
    {
        if (!isset(self::$instanceControllerCity)) {
            self::$instanceControllerCity = new ControllerCity();
        }
        else {
            //Nothing to do
        }

        return self::$instanceControllerCity;
    }

    //Making a City Object
    public function makeObjectCity($codeCounty, $state)
    {
        $cityDao = CityDAO::getInstanceCityDAO();
        $attributeCity = $cityDao->takeCityDatabase($codeCounty);

        $nameCity = $attributeCity[0];

        $city = new City($codeCounty, $nameCity, $state);

        return $city;
    }
}
