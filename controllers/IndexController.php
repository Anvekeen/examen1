<?php
class IndexController {
    private $dao;
    private $view;

    function __construct($get, $post, $route) {
        $this->dao = new UserDAO();
        $this->view = new IndexPageView();
        var_dump($_POST);
        if(isset($post['InputEmail'],$post['InputPassword']) && $post['InputEmail'] && $post['InputPassword']) {
            var_dump('dans if');
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
            $this->displayPage();
        }


    function displayPage() {
        echo $this->view->displayPage();
    }
}

