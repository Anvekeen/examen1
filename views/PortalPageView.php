<?php

class PortalPageView {
    private $page;
    private $render;

    function __construct() {
        $this->page = false;
        $this->render = false;
    }

    function displayPageAll($data1, $data2, $data3) {
        $add = $this->generateHeader($data1);
        $add .= $this->generatePortalAll($data1, $data2, $data3);
        $this->template($add);
        return $this->render;
    }

    function displayPageSingle($data1, $data2, $data3) {
        $add = $this->generateHeader($data1);
        $add .= $this->generatePortalSingle($data1, $data2, $data3);
        $this->template($add);
        return $this->render;
    }


    function template($add) { //fonction composition de la page (appelée dans les fonctions principales)
        $this->page .= $add;
        $this->page .= $this->generateFooter();
        $this->render = $this->generateShell();
    }

    function generateShell() {
        ob_start();
        include 'views/templates/shell.php';
        return ob_get_clean();
    }

    function generatePortalAll($user, $comms, $buildings) {
        ob_start();
        include 'views/templates/portal_all.php';
        return ob_get_clean();
    }

    function generatePortalSingle($user, $comms, $buildings) {
        ob_start();
        include 'views/templates/portal_single.php';
        return ob_get_clean();
    }


    function generateHeader($user) {
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