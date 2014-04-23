<?php

/*  File: City.php
    Description: This class is responsible for getting the list of Cities and States.
*/

class City
{
    private $codeCounty;
    private $dscCidade;

    private $state;

    public function __construct($codeCounty, $dscCidade, $state)
    {
        $this->setCodMunic($codeCounty);
        $this->setDscCidade($dscCidade);

        $this->setState($state);
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getCodMunic()
    {
        return $this->codeCounty;
    }

    public function setCodMunic($codeCounty)
    {
        $this->codeCounty = $codeCounty;
    }

    public function getDscCidade()
    {
        return $this->dscCidade;
    }

    public function setDscCidade($dscCidade)
    {
        $this->dscCidade = $dscCidade;
    }

}
