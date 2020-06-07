<?php


class User {

    private $userID;
    private $usertypeID;
    private $username;
    private $password;
    private $userbuildingID;
    private $apartment_number;
    private $session_token;
    private $session_time;

    public function __construct($userID, $usertypeID, $username, $password, $userbuildingID, $apartment_number,  $session_token, $session_time)
    {
        $this->userID = $userID;
        $this->usertypeID = $usertypeID;
        $this->username = $username;
        $this->password = $password;
        $this->userbuildingID = $userbuildingID;
        $this->apartment_number = $apartment_number;
        $this->session_token = $session_token;
        $this->session_time = $session_time;
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