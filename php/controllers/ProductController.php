<?php 
    require_once(__DIR__ . '/../autoload.php');
    require_once(__DIR__ . '/../models/Product.php');
    require_once(__DIR__ . '/../models/Comment.php');
    
    class ProductController extends ViewController{
        public function index($id = null){    
            $this->render('product-detail');
        }
        public function list($category_id = null){
            header('Content-Type: application/json');

            $db = new DataBase(true);
            $connection = $db->getConnection();
            $productModel = new Product($connection);
            $featuredProducts = $productModel->getFeaturedProducts($category_id);
            $bestSellingProducts = $productModel->getBestSellingProducts($category_id);
            echo json_encode([
                'featuredProducts' => $featuredProducts,
                'bestSellingProducts' => $bestSellingProducts
            ]);
        }
        public function get($id){
            header('Content-Type: application/json');
            $db = new DataBase(true);
            $connection = $db->getConnection();
            $productModel = new Product($connection);
            $product = $productModel->getById($id);

            $commentModel = new Comment($connection);
            $comments = $commentModel->filterByProduct($id);
            echo json_encode([
                'product' => $product,
                'commments' => $comments
            ]);
        }
        public function update(){
            echo 'Estoy en el actualizar';
        }
        public function create(){
            echo 'Estoy en el registro';
        }
    }