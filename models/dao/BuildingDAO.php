<?php


class BuildingDAO extends DAO
{
    protected $table;
    protected $properties;
    protected $deleteBehaviour;

    function __construct()
    {
        $this->table = 'buildings';
        $this->properties = ['buildingID', 'buildingcityID', 'buildingname','buildingaddress'];
        $this->deleteBehaviour = new HardDeleteBehaviour();
        parent::__construct();
    }

    function create($data) {
        //$data['vat'] ? $data['vat] : 0  ==> condition ? si oui : si non;
        return new Building(
        $data['buildingID'],
            $data['buildingcityID'],
            $data['buildingname'],
            $data['buildingaddress'] ? $data['buildingaddress'] : 0
        );
    }

}