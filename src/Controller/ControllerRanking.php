<?php

/*  File: ControllerRanking.php
    Description: Receives the information from RankingDao.php and makes an object with the information.
*/

require_once '/../Dao/RankingDAO.php';

class ControllerRanking
{
    private static $instanceControllerRanking;

    private function __construct()
    {
    }

    //Singleton Pattern
    public static function getInstanceControllerRanking()
    {
        if (!isset(self::$instanceControllerRanking)) {
            self::$instanceControllerRanking = new ControllerRanking();
        }
        else {
            //Nothing to do
        }

        return self::$instanceControllerRanking;
    }

    //Making a Rank
    public function makeRank()
    {
        $rankingDAO = RankingDAO::getInstanceRankingDAO();
        $rankingWithHigherScores = $rankingDAO->getRank();

        return $rankingWithHigherScores;
    }

    //Creating a different image based on the UBS's average grade
    public function getStarImage($average)
    {
        if ($average == 0) {
            $starImg = "<img src='Shared/img/NoStar.png' width='155' height='30'";
        }

        else if ($average > 0 && $average < 1) {
            $starImg = "<img src='Shared/img/StarHalf.png' width='155' height='30'";
        }

        else if ($average >= 1 && $average < 1.5) {
            $starImg = "<img src='Shared/img/StarOne.png' width='155' height='30'";
        }

        else if ($average >= 1.5 && $average < 2) {
            $starImg = "<img src='Shared/img/StarOneHalf.png' width='155' height='30'";
        }

        else if ($average >= 2 && $average < 2.5) {
            $starImg = "<img src='Shared/img/StarTwo.png' width='155' height='30'";
        }

        else if ($average >= 2.5 && $average < 3) {
            $starImg = "<img src='Shared/img/StarTwoHalf.png' width='155' height='30'";
        }

        else if ($average >= 3 && $average < 3.5) {
            $starImg = "<img src='Shared/img/StarThree.png' width='155' height='30'";
        }

        else if ($average >= 3.5 && $average < 4) {
            $starImg = "<img src='Shared/img/StarThreeHalf.png' width='155' height='30'";
        }

        else if ($average >= 4 && $average < 4.5) {
            $starImg = "<img src='Shared/img/StarFour.png' width='155' height='30'";
        }

        else if ($average >= 4.5 && $average < 5) {
            $starImg = "<img src='Shared/img/StarFourHalf.png' width='155' height='30'";
        }

        else if ($average == 5) {
            $starImg = "<img src='Shared/img/StarFive.png' width='155' height='30'";
        }
        
        else {
            //Nothing to do
        }

        return $starImg;
    }

}
