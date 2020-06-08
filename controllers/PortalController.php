<?php


class PortalController
{
    private $userdao;
    private $commdao;
    private $view;

    function __construct($get, $post, $route)
    {
        var_dump($post);
        $this->userdao = new UserDAO();
        $this->commdao = new CommunicationDAO();
        $this->view = new PortalPageView();
        if (isset($post['InputEmail'], $post['InputPassword']) && strlen($post['InputEmail']) && strlen($post['InputPassword'])) {
            var_dump($post['InputEmail']);
            var_dump(htmlspecialchars($post['InputPassword']));
            $user = $this->userdao->verify($post['InputEmail'], $post['InputPassword']);
            if ($user) {
                var_dump('portal',$user);
                var_dump('redirection vers portail connecté, avec user en param');
            } else {
                header("Location:/Examen1/index/redirect");
            }
        }
    }


    function displayPage() {
        echo $this->view->displayPage();
    }

}