<?php


class Users_type
{
    private $typeID;
    private $typename;

    public function __construct($typeID, $typename)
    {
        $this->typeID = $typeID;
        $this->typename = $typename;
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