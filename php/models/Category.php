<?php
    class Category extends ORM{
        public function  __construct(PDO $connection){
            try {
                parent::__construct('id', 'categories', $connection);
            } catch (\Throwable $th) {
                echo $th;
            }
            
        }

        public function getParentCategories(){
            $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE parent_category_id IS NULL");
            $statement->execute();
            $categories = $statement->fetchAll();

            $result = [];
            foreach ($categories as $index => $value) {
                // echo $value; exit;
                $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE parent_category_id = {$value[id]}");
                $statement->execute();
                $subcategories = $statement->fetchAll();
                $value['subcategories'] = $subcategories;
                $result[] = $value;
                // var_dump($value); exit;
            }
            return  $result;
        }
    }