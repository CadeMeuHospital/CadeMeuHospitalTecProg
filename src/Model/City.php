<?php

/*  File: City.php
    Description: This class is responsible for getting the list of Cities and States.
*/
*/

class City
{
    private $codMunic;
    private $dscCidade;

    private $state;

    public function __construct($codMunic, $dscCidade, $state)
    {
        $this->setCodMunic($codMunic);
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
        return $this->codMunic;
    }

    public function setCodMunic($codMunic)
    {
        $this->codMunic = $codMunic;
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
