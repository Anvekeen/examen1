<?php


class Users_typeDAO extends DAO
{
    protected $table;
    protected $id;
    protected $properties;
    protected $deleteBehaviour;
    protected $saveBehaviour;

    function __construct()
    {
        $this->table = 'users_type';
        $this->id = 'typeID';
        $this->properties = ['typeID', 'typename'];
        $this->deleteBehaviour = new HardDeleteBehaviour();
        $this->saveBehaviour = new NormalSaveBehaviour();
        parent::__construct();
    }

    function create($data) {
        return new Users_type(
            $data['typeID'],
            $data['typename']
        );
    }

}