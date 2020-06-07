<?php

class IndexPageView {
    private $page;
    private $render;

    function __construct() {
        $this->page = false;
        $this->render = false;
    }

    function displayPage() {  //fonction principale 1
        $this->template();
        return $this->render;
    }

    function template() { //fonction composition de la page (appelée dans les fonctions principales)
        $this->page = $this->generateHeader();
        $this->page .= $this->generateLogin();
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