<?php 
    require_once(__DIR__ . '/../autoload.php');
    require_once(__DIR__ . '/../models/Category.php');
    
    class CategoryController extends ViewController{
        public function index($id = null){
            $this->render('category');
        }
        public function list(){
            header('Content-Type: application/json');
            $db = new DataBase(true);
            $connection = $db->getConnection();
            $categoryModel = new Category($connection);
            $categories = $categoryModel->getParentCategories();
            echo json_encode($categories);
            // echo json_encode("{ 'values: 'Estoy en el listar'}");
        }
        public function update(){
            echo 'Estoy en el actualizar';
        }
        public function create(){
            echo 'Estoy en el registro';
        }
    }