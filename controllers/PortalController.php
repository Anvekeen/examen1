<?php


class PortalController
{
    private $userdao;
    private $commdao;
    private $view;

    function __construct($get, $post, $route)
    {
        $this->userdao = new UserDAO();
        $this->commdao = new CommunicationDAO();
        $this->view = new PortalPageView();
        if(isset($post['InputEmail'], $post['InputPassword']) && strlen($post['InputEmail']) && strlen($post['InputPassword'])) {
            $post = array_map('htmlspecialchars', $post);
            $user = $this->userdao->verify($post['InputEmail'], $post['InputPassword']);
            if ($user) {
                $this->displayPage($user);
            } else {
                header("Location:/Examen1/index/redirect");
            }
        } else if(isset($_COOKIE['session_token']) && strlen($_COOKIE['session_token'])) {
            $user = $this->userdao->fetchByCookie($_COOKIE['session_token']);
            if($user) {
                $this->displayPage($user);
            } else {
                header('location:/examen1/index');
            }
        } else {
            header("Location:/Examen1/index");
        }
    }


    function displayPage($data) {
        echo $this->view->displayPage($data);
    }

}