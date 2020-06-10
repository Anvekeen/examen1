<?php

class BuildingPageView {
    private $page;
    private $render;

    function __construct() {
        $this->page = false;
        $this->render = false;
    }

    function displayPageAll($data1, $data2, $data3) {
        $add = $this->generateHeader($data1);
        $add .= $this->generatePageAll($data1, $data2, $data3);
        $this->template($add);
        return $this->render;
    }

    function displayPageSingle($data1, $data2, $data3) {
        $add = $this->generateHeader($data1);
        $add .= $this->generatePageSingle($data1, $data2, $data3);
        $this->template($add);
        return $this->render;
    }

    function template($add) {
        $this->page .= $add;
        $this->page .= $this->generateFooter();
        $this->render = $this->generateShell();
    }

    function generateShell() {
        ob_start();
        include 'views/templates/shell.php';
        return ob_get_clean();
    }

    function generatePageAll($user, $user_list, $buildings)
    {
        ob_start();
        include 'views/templates/building_all.php';
        return ob_get_clean();
    }

    function generatePageSingle($user, $user_list, $buildings)
    {
        ob_start();
        include 'views/templates/building_single.php';
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