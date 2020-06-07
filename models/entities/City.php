<?php


class City
{
    private $cityID;
    private $cityname;
    private $cityZIP;

    public function __construct($cityID, $cityname, $cityZIP)
    {
        $this->cityID = $cityID;
        $this->cityname = $cityname;
        $this->cityZIP = $cityZIP;
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