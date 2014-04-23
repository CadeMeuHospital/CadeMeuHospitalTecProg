<?php

/*  File: ControllerProfileUBS.php
    Description: Receives the information from ProfileUBSDao.php and makes an object with the information. 
*/

require_once 'ControllerState.php';
require_once 'ControllerCity.php';
require_once '/../Model/ProfileUBS.php';
require_once '/../Dao/ProfileUBSDAO.php';
require_once '/../Dao/StateDAO.php';
require_once '/../Utils/DataValidation.php';
require_once '/../Utils/DistanceLatLon.php';

class ControllerProfileUBS
{
    private static $instanceControllerProfileUBS;

    private function __construct()
    {
    }

    //Singleton Pattern
    public static function getInstanceControllerProfileUBS()
    {
        if (!isset(self::$instanceControllerProfileUBS)) {
            self::$instanceControllerProfileUBS = new ControllerProfileUBS();
        }

        return self::$instanceControllerProfileUBS;
    }

    //Return one UBS with that id
    public function returnUBS($idUBS)
    {
        $profileUBSDAO = ProfileUBSDAO::getInstanceProfileUBSDAO();

        $attributesUBS = $profileUBSDAO->returnUBS($idUBS);
        $copyAttributesUBS = $attributesUBS;
        if (mysql_fetch_row($copyAttributesUBS) == NULL) {
            return false;
        }

        $profileUBS = self::$instanceControllerProfileUBS->makeObjectLoop($attributesUBS, 0);

        return $profileUBS;
    }

    //Evaluate one UBS
    public function evaluateUBS($evaluate, $idUBS)
    {
        $profileUBSDAO = ProfileUBSDAO::getInstanceProfileUBSDAO();
        $controllerState = ControllerState::getInstanceControllerState();
        $ubs = self::$instanceControllerProfileUBS->returnUBS($idUBS);
        if (!$ubs) {
            return false;
        }
        $stateAcronym = $ubs->getCity()->getState()->getAcronym();
        $resultEvaluation = $profileUBSDAO->saveEvaluationUBS($evaluate, $idUBS);
        $controllerState->saveAverageEvaluationState($evaluate, $stateAcronym);

        return $resultEvaluation;
    }

    //get the distance between two latitude and longitude
    public function getDistanceBetweenTwoLatLon($fromLatitude, $fromLongitude, $toLatitude, $toLongitude)
    {
        return DistanceLatLon::computeDistance($fromLatitude, $fromLongitude, $toLatitude, $toLongitude);
    }

    //Making object in a loop
    public function makeObjectLoop($attributeUBS, $index)
    {
        $idUBS = mysql_result($attributeUBS, $index, "cod_unico");
        $latitudeUBS = mysql_result($attributeUBS, $index, "vlr_latitude");
        $longitudeUBS = mysql_result($attributeUBS, $index, "vlr_longitude");
        $codeCNES = mysql_result($attributeUBS, $index, "cod_cnes");
        $nameUBS = mysql_result($attributeUBS, $index, "nom_estab");
        $dscEnder = mysql_result($attributeUBS, $index, "dsc_endereco");
        $phoneUBS = mysql_result($attributeUBS, $index, "dsc_telefone");
        $physicStructureUBS = mysql_result($attributeUBS, $index, "dsc_estrut_fisic_ambiencia");
        $adapOldPeople = mysql_result($attributeUBS, $index, "dsc_adap_defic_fisic_idosos");
        $descriTools = mysql_result($attributeUBS, $index, "dsc_equipamentos");
        $descMedicine = mysql_result($attributeUBS, $index, "dsc_medicamentos");
        $average = mysql_result($attributeUBS, $index, "average");

        $codeCounty = mysql_result($attributeUBS, $index, "cod_munic");

        $controllerState = ControllerState::getInstanceControllerState();
        $stateUBS = $controllerState->makeObjectState($codeCounty);

        $controllerCity = ControllerCity::getInstanceControllerCity();
        $cityUBS = $controllerCity->makeObjectCity($codeCounty, $stateUBS);

        $ubs = new ProfileUBS($idUBS, $latitudeUBS, $longitudeUBS, $codeCNES,
                $nameUBS, $dscEnder, $phoneUBS, $physicStructureUBS,
                $adapOldPeople, $descriTools, $descMedicine, $average, $cityUBS);

        return $ubs;
    }

    //searching one UBS
    public function searchUBS($field, $searchType)
    {
        $profileUBSDAO = ProfileUBSDAO::getInstanceProfileUBSDAO();

        $cont = 0;
        $arrayUBS = array();
        try {
            $attributesUBS = $profileUBSDAO->searchUBSinDatabase($field, $searchType);
            $lines = mysql_num_rows($attributesUBS);
            while ($cont < $lines) {

                $UBS = self::$instanceControllerProfileUBS->makeObjectLoop($attributesUBS, $cont);

                array_push($arrayUBS, $UBS);

                $cont++;
            }
        } catch (TextFieldException $e) {
            print "<script>alert('" . $e->getMessage() . "')</script>";
            print "<script>window.location='../View/Home.php'</script>";
        }

        return $arrayUBS;
    }

}
