<?php

/*  File: RankingDAO.php
    Description: This class takes the data from the database and sends the information to ControllerRanking.php.
*/

require_once '/../Utils/DataBaseConnection.php';

class RankingDAO
{
    private static $instanceRankingDAO;

    private function __construct()
    {
    }

    //Singleton
    public static function getInstanceRankingDAO()
    {
        if (!isset(self::$instanceRankingDAO)) {
            self::$instanceRankingDAO = new RankingDAO();
        }

        return self::$instanceRankingDAO;
    }

    //Getting the TOP 5 UBS based on their average grade
    public function getRank()
    {
        $sql = "SELECT nom_estab,cod_unico,average FROM ubs INNER JOIN evaluate
                ON ubs.cod_unico = evaluate.id_cod_unico WHERE average > 0
                ORDER BY average DESC,amount_people DESC LIMIT 5";
        $result = mysql_query($sql);

        return $result;
    }
}
