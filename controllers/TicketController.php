<?php

class TicketController
{
    private $userdao;
    private $buildingdao;
    private $commdao;
    private $comm_statedao;
    private $view;

    function __construct($get, $post, $route)
    {
        $message = false;
        $this->userdao = new UserDAO();
        $this->buildingdao = new BuildingDAO();
        $this->commdao = new CommunicationDAO();
        $this->comm_statedao = new Comm_stateDAO();
        $this->view = new TicketPageView();
        if (isset($_COOKIE['session_token']) && strlen($_COOKIE['session_token'])) {
            $user = $this->fetchbyCookie($_COOKIE['session_token']);
            if ($user) {
                if(isset($post['commtitle'], $post['commdescription'], $post['commbuildingID'], $post['commuserID'], $post['commstateID']) &&
                    strlen($post['commtitle']) &&
                    strlen($post['commdescription']) &&
                    strlen($post['commbuildingID']) &&
                    strlen($post['commuserID']) &&
                    strlen($post['commstateID'])) {
                    $post = array_map('htmlspecialchars', $post);
                    $this->commdao->save($post);
                    $message = 'Ticket / Communication bien envoyée';
                }
                $this->testUser($user, $message);
            } else {
                header('location:/examen1/index');
            }
        } else {
            header("Location:/examen1/index");
        }
    }

    function fetchbyCookie($cookie) {
        return $this->userdao->fetchByCookie($cookie);
    }

    function displayPage($data1, $data2, $data3, $message) {
        echo $this->view->displayPage($data1, $data2, $data3, $message);
    }

    function testUser($user, $message)
    {
        if ($user->__get('usertypeID')->__get('typename') == 'syndic') {
            $buildings = $this->buildingdao->fetchAll();
            $stateID = 1;
        } else {
            $buildings = $this->buildingdao->fetchAll();
            $stateID = 2;
        }
        $this->displayPage($user, $stateID, $buildings, $message);
    }

}