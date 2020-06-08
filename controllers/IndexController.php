<?php
class IndexController {
    private $userdao;
    private $buildingdao;
    private $view;

    function __construct($get, $post, $route)
    {
        $this->userdao = new UserDAO();
        $this->buildingdao = new BuildingDAO();
        $this->view = new IndexPageView();

        if (isset($get['form']) && $get['form'] == 'show') {
            $this->displaySubForm($this->buildingdao->fetchAll());
        } else if (isset($route[1]) && $route[1] == 'redirect') { // après être passé dans portalcontroller, si login faux
            // pas sûr si mieux une nouvelle fonction comme ici, ou passer un param dans displaypage
            // pour ensuite choisir avec un ifparam=X ou ifparam=Y ... et éviter cette new fonction
            $message = 'Votre adresse mail et/ou mot de passe est incorrect.';
            $this->displayLogMessage($message);
        } else if (isset($post['username'], $post['password'], $post['usertypeID'], $post['userbuildingID'], $post['apartment_number']) &&
                strlen($post['username']) &&
                strlen($post['password']) &&
                strlen($post['usertypeID']) &&
                strlen($post['userbuildingID']) &&
                strlen($post['apartment_number'])) {
                $post = array_map('htmlspecialchars', $post);
                $test = $this->userdao->save($post);
                if ($test == 'doublon') {
                    $message = 'Cette adresse mail est déjà enregistrée. Veuillez en choisir une autre.';
                    $this->displayLogMessage($message);
                } else {
                    $message = 'Inscription validée.';
                    $this->displayLogMessage($message);
            }
        }
        else {
            $this->displayPage();
        }
    }

    function displayPage() {
        echo $this->view->displayPage();
    }

    function displayLogMessage($message) {
        echo $this->view->displayLogMessage($message);
    }


        function displaySubForm($data) {
        echo $this->view->displaySubForm($data);
    }

}

