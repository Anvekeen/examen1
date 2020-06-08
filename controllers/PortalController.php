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
        if (isset($post['InputEmail'], $post['InputPassword']) && strlen($post['InputEmail']) && strlen($post['InputPassword'])) {
            $post = array_map('htmlspecialchars', $post);
            $user = $this->userdao->verify($post['InputEmail'], $post['InputPassword']);
            if ($user) {
                $this->displayPage($user);
            } else {
                header("Location:/Examen1/index/redirect");
            }
        } else {
            echo 'ERREUR';
        }
    }


    function displayPage($data) {
        echo $this->view->displayPage($data);
    }

}