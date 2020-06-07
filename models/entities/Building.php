<?php


class Building {

    private $buildingID;
    private $buildingcityID;
    private $buildingname;
    private $buildingaddress;

    public function __construct($buildingID, $buildingcityID, $buildingname, $buildingaddress)
    {
        $this->buildingID = $buildingID;
        $this->buildingcityID = $buildingcityID;
        $this->buildingname = $buildingname;
        $this->buildingaddress = $buildingaddress;
    }

    function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

}