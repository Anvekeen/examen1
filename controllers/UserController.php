<?php

class UserController
{
    private $dao;
    private $view;

    function __construct($get, $post, $route)
    {
        $this->dao = new UserDAO();
        $this->view = new IndexPageView();
        var_dump('in usercontroller');
        if (isset($get['sub']) && $get['sub'] == 1) {
            var_dump('user');
        }
    }
}