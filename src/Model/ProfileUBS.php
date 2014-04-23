<?php

/*  File: ProfileUBS.php
    Description: This class is responsible for getting the UBS's attributes.
*/

class ProfileUBS
{
    private $idUBS;
    private $latitudeUBS;
    private $longitudeUBS;
    private $codeCNES;
    private $nameUBS;
    private $descEnder;
    private $phoneUBS;
    private $physicStructureUBS;
    private $adaptabilityAgedPerson;
    private $descriptionTools;
    private $descMedicine;
    private $average;

    private $city;

    public function __construct($idUBS, $latitudeUBS, $longitudeUBS, $codeCNES,
            $nameUBS, $descEnder, $phoneUBS,$physicStructureUBS,
            $adaptabilityAgedPerson, $descriptionTools, $descMedicine,
            $average, $city) {
        $this->setIdUBS($idUBS);
        $this->setLatitudeUBS($latitudeUBS);
        $this->setLongitudeUBS($longitudeUBS);
        $this->setCodCNES($codeCNES);
        $this->setNameUBS($nameUBS);
        $this->setDescEnder($descEnder);
        $this->setPhoneUBS($phoneUBS);
        $this->setPhysicStructureUBS($physicStructureUBS);
        $this->setAdapOldPeople($adaptabilityAgedPerson);
        $this->setDescriTools($descriptionTools);
        $this->setDescMedicine($descMedicine);
        $this->setAverage($average);

        $this->setCity($city);
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getIdUBS()
    {
        return $this->idUBS;
    }

    public function setIdUBS($idUBS)
    {
        $this->idUBS = $idUBS;
    }

    public function getLatitudeUBS()
    {
        return $this->latitudeUBS;
    }

    public function setLatitudeUBS($latitudeUBS)
    {
        $this->latitudeUBS = $latitudeUBS;
    }

    public function getLongitudeUBS()
    {
        return $this->longitudeUBS;
    }

    public function setLongitudeUBS($longitudeUBS)
    {
        $this->longitudeUBS = $longitudeUBS;
    }

    public function getCodCNES()
    {
        return $this->codeCNES;
    }

    public function setCodCNES($codeCNES)
    {
        $this->codeCNES = $codeCNES;
    }

    public function getNameUBS()
    {
        return $this->nameUBS;
    }

    public function setNameUBS($nameUBS)
    {
        $this->nameUBS = $nameUBS;
    }

    public function getDescEnder()
    {
        return $this->descEnder;
    }

    public function setDescEnder($descEnder)
    {
        $this->descEnder = $descEnder;
    }

    public function getPhoneUBS()
    {
        return $this->phoneUBS;
    }

    public function setPhoneUBS($phoneUBS)
    {
        $this->phoneUBS = $phoneUBS;
    }

    public function getPhysicStructureUBS()
    {
        return $this->physicStructureUBS;
    }

    public function setPhysicStructureUBS($physicStructureUBS)
    {
        $this->physicStructureUBS = $physicStructureUBS;
    }

    public function getAdapOldPeople()
    {
        return $this->adaptabilityAgedPerson;
    }

    public function setAdapOldPeople($adaptabilityAgedPerson)
    {
        $this->adaptabilityAgedPerson = $adaptabilityAgedPerson;
    }

    public function getDescriTools()
    {
        return $this->descriptionTools;
    }

    public function setDescriTools($descriptionTools)
    {
        $this->descriptionTools = $descriptionTools;
    }

    public function getDescMedicine()
    {
        return $this->descMedicine;
    }

    public function setDescMedicine($descMedicine)
    {
        $this->descMedicine = $descMedicine;
    }

    public function setAverage($average)
    {
        $this->average = $average;
    }

    public function getAverage()
    {
        return $this->average;
    }

}
