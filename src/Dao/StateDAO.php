<?php

/*  File: StateDAO.php
    Description: This class takse the data from the database and sends the information to ControllerState.php.
*/

require_once '/../Utils/DataBaseConnection.php';

class StateDAO
{
    private static $instanceStateDAO;

    private function __construct()
    {
    }

    //Singleton
    public static function getInstanceStateDAO()
    {
        if (!isset(self::$instanceStateDAO)) {
            self::$instanceStateDAO = new StateDAO();
        }
        
        else {
            //Nothing to do
        }

        return self::$instanceStateDAO;
    }

    //Saving The average Evaluation from a State
    public function saveAverageEvaluationStateDAO($evaluate, $stateAcronym)
    {
        $sqlAvgCount = "SELECT SUM(ubs.average) AS average,
                        COUNT(ubs.average) AS quantity FROM ubs
                        INNER JOIN state, municipios_ibge
                        WHERE state.acronym = municipios_ibge.uf
                        AND state.acronym = '" . $stateAcronym . "'
                        AND municipios_ibge.codigo = ubs.cod_munic
                        AND ubs.average <> 0";

        $resultAvgCount = mysql_query($sqlAvgCount);
        $arrayAvgCount = mysql_fetch_row($resultAvgCount);

        if ($arrayAvgCount[1] > 0) {
            $average = ($arrayAvgCount[0]) / ($arrayAvgCount[1]);
            $sql = "UPDATE state SET average = '" . $average . "' WHERE acronym = '" . $stateAcronym . "'";
        } else {
            $sql = "UPDATE state SET average = '" . $evaluate . "' WHERE acronym = '" . $stateAcronym . "'";
        }

        $result = mysql_query($sql);

        return $result;
    }

    //Getting a determined city's state from DB
    public function takeUfStateUBS($codeCounty)
    {
        $sql = "SELECT uf FROM municipios_ibge WHERE codigo LIKE '" . $codeCounty . "'";
        $result = mysql_query($sql);
        $state = mysql_fetch_row($result);

        return $state;
    }

    //Getting all states from DB
    public function takeStateUBSOO($codeCounty)
    {
        $ufState = $this->takeUfStateUBS($codeCounty);

        $sql = "SELECT * FROM state WHERE acronym LIKE '" . $ufState[0] . "'";
        $result = mysql_query($sql);
        $state = mysql_fetch_row($result);

        return $state;
    }

}
