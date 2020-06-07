<?php


class CityDAO extends DAO
{
    protected $table;
    protected $properties;
    protected $deleteBehaviour;

    function __construct()
    {
        $this->table = 'cities';
        $this->properties = ['cityID', 'cityname', 'cityZIP'];
        $this->deleteBehaviour = new HardDeleteBehaviour();
        parent::__construct();
    }

    function create($data) {
        //$data['vat'] ? $data['vat] : 0  ==> condition ? si oui : si non;
        return new City(
            $data['cityID'],
            $data['cityname'],
            $data['cityZIP'] ? $data['cityZIP'] : 0
        );
    }

}