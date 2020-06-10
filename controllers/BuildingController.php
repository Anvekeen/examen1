<?php

class BuildingController
{
    private $userdao;
    private $buildingdao;
    private $view;

    function __construct($get, $post, $route)
    {
        $this->userdao = new UserDAO();
        $this->buildingdao = new BuildingDAO();
        $this->view = new BuildingPageView();
        if (isset($route[1]) && $route[1] == 'delete' && isset($_COOKIE['session_token']) && strlen($_COOKIE['session_token'])) {
            $user = $this->fetchbyCookie($_COOKIE['session_token']);
            if ($user) {
                if (isset($post['buildingdelete']) && strlen($post['buildingdelete']) && ($user->__get('usertypeID')->__get('typename') == 'syndic')) {
                    $this->buildingdao->delete($post['buildingdelete']);
                }
                $this->testUser($user);
            } else {
                header('location:/examen1/index');
            }
        } else if (isset($_COOKIE['session_token']) && strlen($_COOKIE['session_token'])) {
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
        if ($user->__get('usertypeID')->__get('typename') == 'syndic') {
            $user_list = $this->userdao->fetchAll();
            $buildings = $this->buildingdao->fetchAll();
            $this->displayPageAll($user, $user_list, $buildings);
        } else {
            $id = $user->__get('userbuildingID');
            $users = $this->userdao->search('userbuildingID', $id);
            $buildings = $this->buildingdao->fetch($id);
            $this->displayPageSingle($user, $users, $buildings);
        }
    }

}