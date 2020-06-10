<?php


class BuildingDAO extends DAO
{
    protected $table;
    protected $properties;
    protected $deleteBehaviour;
    protected $saveBehaviour;
    protected $cityDAO;

    function __construct()
    {
        $this->table = 'buildings';
        $this->properties = ['buildingID', 'buildingcityID', 'buildingname','buildingaddress'];
        $this->deleteBehaviour = new HardDeleteBehaviour();
        $this->saveBehaviour = new NormalSaveBehaviour();
        $this->cityDAO = new CityDAO();
        parent::__construct();
    }

    function create($data) {
        if ($data['buildingID'] > 0) {
        return new Building(
            $data['buildingID'],
            $this->cityDAO->fetch($data['buildingcityID']),
            $data['buildingname'],
            $data['buildingaddress']
        );
        } else if($data) {
            return new Building(
                $data['buildingID'],
                $data['buildingcityID'],
                $data['buildingname'],
                $data['buildingaddress']
            );
        } else {
            return false;
        }
    }

}