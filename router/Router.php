<?php

/* Correction des problèmes :
1. modification de la méthode parse root :
        //changé car permet d'obtenir le bon root !
        //précédemment, "projet/index.php/delete" renvoyait comme root
        // "/monprojetSGBD//delete"
        //maintenant, on lui dit de commencer au début du string et de finir là où
        //index.php commence dans le string.
        //ça renvoie donc bien "/monprojetSGBD/"

2. si on a index.php/delete, sera modifié en tableau vide en path[0]
et contenant delete en path[1]
C'est possible à gérer si on doit bien ajouter un DeleteController pour la suppression

*/

class Router {
    private $get;
    private $post;
    private $route;
    private $root;
    private $controller_list;
    private $controller;
    private $controller_name;
    
    function __construct($get, $post, $self, $url) {
        //on pouvait checker qu'est-ce que le self & url avec var_dump $_SERVER
        $this->get = $get;
        $this->post = $post;
        $this->controller_list = ['index', 'portal', 'building', 'ticket']; // Elle est à hard-coder!
        $this->controller_name = false;
        $this->controller = false;
        $this->root = $this->parseRoot($self);
        $this->route = $this->parseURL($url);
        $this->run();
    }
    
    private function parseRoot($self) {
        //return str_replace('index.php', '', $self);
        //note : le self = index dès lors qu'on est sur l'index ! (même si url affichée différente)
        return substr($self, 0, strpos($self, "index.php"));
    }
    
    private function parseURL($url) {
        // on a enlevé index.php de l'url pour obtenir le root
        $path = str_ireplace($this->root, '', $url);
        $path = explode('/', $path);
        $controller = false;
        //note : rentre d'office dans le if car path est array après le explode
        //CORRIGE!!!aussi! Ce if supprime le string s'il n'y a pas de "?" ! ex : index.php => ''CORRIGE!!!
        if ($path && strlen($path[0]) && (strpos($path[0], "?") !== false)) {
            //check si path0 contient qqch et surtout s'il contient '?'
            $path[0]=substr($path[0],0,strpos($path[0],"?"));
        }

        if($path && strlen($path[0]) && (strpos($path[0], ".") !== false)) {
            $path[0]=substr($path[0],0,strpos($path[0],"."));
            $controller = $path[0];
        } else if ($path && strlen($path[0])) {
                $controller = $path[0];
        } else if($path && !strlen($path[0])) {
            $controller = 'index';
         }
        if($controller && in_array($controller, $this->controller_list)) {
            $this->controller_name = ucfirst($controller.'Controller');
        }
        return $path;
    }


    private function run() {
        if($this->controller_name) {
            $this->controller = new $this->controller_name($this->get, $this->post, $this->route);
        }
    }


}