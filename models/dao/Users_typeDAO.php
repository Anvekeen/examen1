<?php


class Users_typeDAO extends DAO
{
    protected $table;
    protected $id;
    protected $properties;
    protected $deleteBehaviour;

    function __construct()
    {
        $this->table = 'users_type';
        $this->id = 'typeID';
        $this->properties = ['typeID', 'typename'];
        $this->deleteBehaviour = new HardDeleteBehaviour();
        parent::__construct();
    }

    function create($data) {
        //$data['vat'] ? $data['vat] : 0  ==> condition ? si oui : si non;
        return new Users_type(
            $data['typeID'],
            $data['typename'] ? $data['typename'] : 0
        );
    }

}