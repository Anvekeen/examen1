<?php

class IndexPageView {
    private $page;
    private $render;

    function __construct() {
        $this->page = false;
        $this->render = false;
    }

    function displayPage() {  //fonction principale 1
        $add = $this->generateLogin();
        $this->template($add);
        return $this->render;
    }

    function displayPageError() {  //affiche erreur de login
        $add = $this->generateError();
        $add .= $this->generateLogin();
        $this->template($add);
        return $this->render;
    }

    function displaySub($data) {  //appel du formulaire
        return $this->generateSub($data);
    }

    function template($add) { //fonction composition de la page (appelée dans les fonctions principales)
        $this->page = $this->generateHeader();
        $this->page .= $add;
        $this->page .= $this->generateFooter();
        $this->render = $this->generateShell();
    }

    function generateShell() {
        ob_start();
        include 'views/templates/shell.php';
        return ob_get_clean();
    }

    function generateLogin() {
        ob_start();
        include 'views/templates/login.php';
        return ob_get_clean();
    }

    function generateError() {
        ob_start();
        include 'views/templates/loginerror.php';
        return ob_get_clean();
    }

    function generateSub($buildings) {
        ob_start();
        include 'views/templates/new_user_form.php';
        return ob_get_clean();
    }

    function generateHeader() {
        ob_start();
        include 'views/templates/header.php';
        return ob_get_clean();
    }

    function generateFooter() {
        ob_start();
        include 'views/templates/footer.php';
        return ob_get_clean();
    }

    function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}