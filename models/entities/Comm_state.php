<?php


class Comm_state
{
    private $stateID;
    private $statename;

    public function __construct($stateID, $statename)
    {
        $this->stateID = $stateID;
        $this->statename = $statename;
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