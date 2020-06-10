<?php


class Comm_stateDAO extends DAO
{
    protected $table;
    protected $properties;
    protected $deleteBehaviour;
    protected $saveBehaviour;

    function __construct()
    {
        $this->table = 'comm_state';
        $this->properties = ['stateID', 'statename'];
        $this->deleteBehaviour = new HardDeleteBehaviour();
        $this->saveBehaviour = new NormalSaveBehaviour();
        parent::__construct();
    }

    function create($data) {
        return new Comm_state(
            $data['stateID'],
            $data['statename']
        );
    }

}