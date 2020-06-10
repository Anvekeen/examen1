<?php


class PortalController
{
    private $userdao;
    private $commdao;
    private $buildingdao;
    private $view;

    function __construct($get, $post, $route)
    {
        $this->userdao = new UserDAO();
        $this->commdao = new CommunicationDAO();
        $this->buildingdao = new BuildingDAO();
        $this->view = new PortalPageView();
        if(isset($route[1]) && $route[1] == 'delete' && isset($_COOKIE['session_token']) && strlen($_COOKIE['session_token'])) {
            $user = $this->fetchbyCookie($_COOKIE['session_token']);
            if ($user) {
            if (isset($post['commdelete']) && strlen($post['commdelete']) && ($user->__get('usertypeID')->__get('typename') == 'syndic')) {
                $this->commdao->delete($post['commdelete']);
            }
            $this->testUser($user);
            } else {
                header('location:/examen1/index');
            }
        } else if(isset($post['InputEmail'], $post['InputPassword']) && strlen($post['InputEmail']) && strlen($post['InputPassword'])) {
            $post = array_map('htmlspecialchars', $post);
            $user = $this->userdao->verify($post['InputEmail'], $post['InputPassword']);
            if ($user) {
                $this->testUser($user);
            } else {
                header("Location:/examen1/index/redirect");
            }
        } else if(isset($_COOKIE['session_token']) && strlen($_COOKIE['session_token'])) {
            $user = $this->fetchbyCookie($_COOKIE['session_token']);
            if ($user) {
                $this->testUser($user);
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

    function displayPageAll($data1, $data2, $data3) {
        echo $this->view->displayPageAll($data1, $data2, $data3);
    }

    function displayPageSingle($data1, $data2, $data3) {
        echo $this->view->displayPageSingle($data1, $data2, $data3);
    }

    function testUser($user)
    {
        if($user->__get('usertypeID')->__get('typename') == 'syndic') {
            $comms = $this->commdao->fetchAll();
            $buildings = $this->buildingdao->fetchAll();
            $this->displayPageAll($user, $comms, $buildings);
        } else {
            $id = $user->__get('userbuildingID');
            $comms = $this->commdao->search('commbuildingID', $id);
            $buildings = $this->buildingdao->fetch($id);
            $this->displayPageSingle($user, $comms, $buildings);
        }
    }

}