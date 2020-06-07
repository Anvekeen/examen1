<?php


class CommunicationDAO extends DAO
{
    protected $table;
    protected $properties;
    protected $deleteBehaviour;

    function __construct()
    {
        $this->table = 'communications';
        $this->properties = ['commID', 'commbuildingID', 'commuserID', 'commstateID', 'commtitle', 'commdescription', 'commdate'];
        $this->deleteBehaviour = new HardDeleteBehaviour();
        parent::__construct();
    }

    function create($data) {
        //$data['vat'] ? $data['vat] : 0  ==> condition ? si oui : si non;
        return new Communication(
            $data['commID'],
            $data['commbuildingID'],
            $data['commuserID'],
            $data['commstateID'],
            $data['commtitle'],
            $data['commdescription'],
            $data['commdate'] ? $data['commdate'] : 0
        );
    }

}