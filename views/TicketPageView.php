<?php

class TicketPageView {
    private $page;
    private $render;

    function __construct() {
        $this->page = false;
        $this->render = false;
    }

    function displayPage($data1, $data2, $data3, $message) {
        $add = $this->generateHeader($data1);
        if($message){
        $add .= $this->generateMessage($message);
        }
        $add .= $this->generatePage($data1, $data2, $data3);
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

    function generateMessage($message) {
        ob_start();
        include 'views/templates/message.php';
        return ob_get_clean();
    }

    function generatePage($user, $stateID, $buildings)
    {
        ob_start();
        include 'views/templates/ticket.php';
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