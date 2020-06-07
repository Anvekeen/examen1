<?php


class Communication
{
    private $commID;
    private $commbuildingID;
    private $commuserID;
    private $commstateID;
    private $commtitle;
    private $commdescription;
    private $commdate;

    public function __construct($commID, $commbuildingID, $commuserID, $commstateID, $commtitle, $commdescription, $commdate)
    {
        $this->commID = $commID;
        $this->commbuildingID = $commbuildingID;
        $this->commuserID = $commuserID;
        $this->commstateID = $commstateID;
        $this->commtitle = $commtitle;
        $this->commdescription = $commdescription;
        $this->commdate = $commdate;
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