<?php

class PortalPageView {
    private $page;
    private $render;

    function __construct() {
        $this->page = false;
        $this->render = false;
    }

    function displayPage($data) {  //fonction principale 1
        $this->template($data);
        return $this->render;
    }

    function template($data) { //fonction composition de la page (appelée dans les fonctions principales)
        $this->page = $this->generateHeader();
        $this->page .= $this->generatePortal($data);
        $this->page .= $this->generateFooter();
        $this->render = $this->generateShell();
    }

    function generateShell() {
        ob_start();
        include 'views/templates/shell.php';
        return ob_get_clean();
    }

    function generatePortal($user) {
        ob_start();
        include 'views/templates/portal.php';
        return ob_get_clean();
    }


    function generateHeader() {
        ob_start();
        include 'views/templates/headerlog.php';
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