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

    function displayLogMessage($message) {  //affiche erreur de login
        $add = $this->generateLogin();
        $add .= $this->generateLogMessage($message);
        $this->template($add);
        return $this->render;
    }

    function displaySubForm($data) {  //appel du formulaire
        return $this->generateSubForm($data);
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

    function generateLogMessage($message) {
        ob_start();
        include 'views/templates/loginmessage.php';
        return ob_get_clean();
    }

    function generateSubForm($buildings) {
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