<?php
    class Product extends ORM{
        public function  __construct(PDO $connection){
            try {
                parent::__construct('id', 'products', $connection);
            } catch (\Throwable $th) {
                echo $th;
            }
            
        }
        public function getFeaturedProducts($category_id){
            $queryString = "SELECT * FROM {$this->table} ";

            if($category_id)
                $queryString .= " WHERE main_category_id = {$category_id} ";

            $queryString .= " ORDER BY RAND() LIMIT 10;";

            $statement = $this->db->prepare(
                 $queryString
            );
            $statement->execute();
            return $statement->fetchAll();   
        }

        public function getBestSellingProducts($category_id){
            // NO ENTENDI MUY BIEN COMO SACAR LOS PRODUCTOS MAS VENDIDOS ASI QUE IMPROBISE ESTE SELECT

            $queryString = "SELECT COUNT(c.id) AS numComments, p.*
                    FROM products AS p
                    INNER JOIN comments AS c ON c.product_id = p.id ";

            if($category_id)
                $queryString .= " WHERE main_category_id = {$category_id} ";

            $queryString .= "    GROUP BY p.id
                    ORDER BY numComments DESC
                    LIMIT 10;";

            // return $queryString;
            $statement = $this->db->prepare(
                $queryString
            );
            $statement->execute();
            return $statement->fetchAll();
        }

        public function createRandomProducts($quantity = 1){
            $db = new DataBase(true);
            $connection = $db->getConnection();
            if (!$connection)
                exit("Hubo un error al crear la conexion con la BD");

            $connection->beginTransaction();
            for ($i=0; $i < $quantity; $i++) { 
                try {
                    $productModel = getRandomProductModel();
                    $category_id = $productModel['category_id'];
                    $this->insert([
                        'name' =>  getRandomProductName($category_id),
                        'model' => $productModel['model'],
                        'specifications' => getRandomProductSpecification($category_id),
                        'price' => getRandomProductPrice(),
                        'brand' => getRandomProductBrand($category_id),
                        'main_category_id' => $category_id
                    ]);
                } catch (PDOException $e) {
                    $connection->rollBack();
                    exit("Error al ejecutar las consultas: " . $e->getMessage());
                }
            }
            $connection->commit();

            echo "Se registraron {$quantity} productos correctamente. \n";
        }
    }