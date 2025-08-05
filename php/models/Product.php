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
    }