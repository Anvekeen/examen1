<?php


class Comm_stateDAO extends DAO
{
    protected $table;
    protected $properties;
    protected $deleteBehaviour;

    function __construct()
    {
        $this->table = 'comm_state';
        $this->properties = ['stateID', 'statename'];
        $this->deleteBehaviour = new HardDeleteBehaviour();
        parent::__construct();
    }

    function create($data) {
        //$data['vat'] ? $data['vat] : 0  ==> condition ? si oui : si non;
        return new Comm_state(
            $data['stateID'],
            $data['statename'] ? $data['statename'] : 0
        );
    }

}