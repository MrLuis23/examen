<?php 
    require_once(__DIR__ . '/../autoload.php');
    require_once(__DIR__ . '/../models/Product.php');
    
    class HomeController extends ViewController{
        public function index($id = null){
            $this->render('home');
        }
        public function list(){
            echo 'Estoy en el listar';
        }
        public function update(){
            echo 'Estoy en el actualizar';
        }
        public function create(){
            echo 'Estoy en el registro';
        }
    }