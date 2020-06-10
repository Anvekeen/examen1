<?php


class CityDAO extends DAO
{
    protected $table;
    protected $properties;
    protected $deleteBehaviour;
    protected $saveBehaviour;

    function __construct()
    {
        $this->table = 'cities';
        $this->properties = ['cityID', 'cityname', 'cityZIP', 'valide'];
        $this->deleteBehaviour = new SoftDeleteBehaviour();
        $this->saveBehaviour = new NormalSaveBehaviour();
        parent::__construct();
    }

    function create($data) {
        if ($data['cityID'] > 0) {
            return new City(
                $data['cityID'],
                $data['cityname'],
                $data['cityZIP'],
                $data['valide']
            );
        } else if($data) {
            return new City(
                $data['cityID'],
                $data['cityname'],
                $data['cityZIP'],
                $data['valide'] = 1
            );
        } else {
            return false;
        }
    }

}