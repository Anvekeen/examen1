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

        if (isset($get['form']) && $get['form'] == 'show') { // affiche form d'inscription
            $this->displaySub($this->buildingdao->fetchAll());
        } else if (isset($route[1]) && $route[1] == 'redirect') { // après être passé dans portalcontroller, si login faux
            // pas sûr si mieux une nouvelle fonction comme ici, ou passer un param dans displaypage
            // pour ensuite choisir avec un ifparam=X ou ifparam=Y ... et éviter cette new fonction
            $this->displayPageError();
        } else {
            if (isset($post['InputEmailSub'], $post['InputPasswordSub'], $post['InputType'], $post['InputBuilding'], $post['InputAppart']) &&
                strlen($post['InputEmailSub']) && strlen($post['InputPasswordSub']) && strlen($post['InputType']) && strlen($post['InputBuilding']) && strlen($post['InputAppart'])) {
                $post = array_map('htmlspecialchars', $post);
            } else {
                var_dump('subscription failed');
            }
        }
        else {
            $this->displayPage();
        }
    }

    /*if($get && $get['idprod']) {
        $this->displayOne($get['idprod']);
    } else {
        if($post && isset($_POST['type']) && $_POST['type'] == 'productcreate') {
            $this->dao->save($post);
        } else if( isset($route[1]) && $route[1] == 'delete' && $post && $_POST['productdelete'] /&& strlen($route[1]) && $route[1] == 'delete'/){
            var_dump($route);
            $this->dao->delete($_POST['productdelete']);
        }*/


    function displayPage() {
        echo $this->view->displayPage();
    }

    function displayPageError()
    {
        echo $this->view->displayPageError();
    }

        function displaySub($data) {
        echo $this->view->displaySub($data);
    }

}

