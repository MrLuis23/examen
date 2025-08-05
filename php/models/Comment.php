<?php
    class Comment extends ORM{
        public function  __construct(PDO $connection){
            try {
                parent::__construct('id', 'comments', $connection);
            } catch (\Throwable $th) {
                echo $th;
            }
            
        }

        public function filterByProduct($product_id){
            $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE product_id = {$product_id}" ) ;
            $statement->execute();
            return $statement->fetchAll();
        }
    }