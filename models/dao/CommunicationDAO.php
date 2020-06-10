<?php


class CommunicationDAO extends DAO
{
    protected $table;
    protected $properties;
    protected $deleteBehaviour;
    protected $saveBehaviour;
    protected $comm_stateDAO;
    protected $userDAO;

    function __construct()
    {
        $this->table = 'communications';
        $this->properties = ['commID', 'commbuildingID', 'commuserID', 'commstateID', 'commtitle', 'commdescription', 'commdate'];
        $this->deleteBehaviour = new HardDeleteBehaviour();
        $this->saveBehaviour = new NormalSaveBehaviour();
        $this->comm_stateDAO = new Comm_stateDAO();
        $this->userDAO = new UserDAO();
        parent::__construct();
    }

    function create($data) {
        if ($data['commID'] > 0) {
        return new Communication(
            $data['commID'],
            $data['commbuildingID'],
            $this->userDAO->fetch($data['commuserID']),
            $this->comm_stateDAO->fetch($data['commstateID']),
            $data['commtitle'],
            $data['commdescription'],
            $data['commdate']
        );
        } else if($data) {
            return new Communication(
                $data['commID'],
                $data['commbuildingID'],
                $data['commuserID'],
                $data['commstateID'],
                $data['commtitle'],
                $data['commdescription'],
                $data['commdate'] ? $data['commdate'] : new DateTime()
            );
        } else {
            return false;
        }
    }
}