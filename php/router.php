<?php
    class Router{
        private $controller;
        private $action;
        private $id;

        public function __construct(){
            $this->matchRoute();
        }
        public function matchRoute(){
            $url = explode('/', URL);
            $this->controller = !empty($url[1]) ? $url[1] : 'Home';
            $this->action = !empty($url[2]) ? $url[2] : 'index';
            $this->controller = $this->controller . 'Controller';
            $this->id = !empty($url[3]) ? $url[3] : '';
            require_once(__DIR__ . '/controllers/' . ucfirst($this->controller) . '.php');
        }

        public function run(){
            $controller = new $this->controller();
            $action = $this->action;
            $id  = null;
            session_start();

            

            if(is_numeric($action)){
                $id =  $action;
                $action = 'index';

                $_SESSION['id'] = $id;
            }else{
                $_SESSION['id'] = null;
            }

                
            try {
                $controller->$action($this->id ? (int)$this->id : null);
            } catch (\Throwable $th) {
                echo $th;
            }
        }
    }