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

        public function createRandomComments($quantity = 1){
            $db = new DataBase(true);
            $connection = $db->getConnection();
            if (!$connection)
                exit("Hubo un error al crear la conexion con la BD");

            $connection->beginTransaction();
            for ($i=0; $i < $quantity; $i++) { 
                try {
                    $this->insert([
                        'text' =>  getRandomComment(),
                        'user_name' => getRandomFullName(),
                        'product_id' => getRandomProduct(),
                        'product_rate' => getRandomProductRate(),
                    ]);
                } catch (PDOException $e) {
                    $connection->rollBack();
                    exit("Error al ejecutar las consultas: " . $e->getMessage());
                }
            }
            $connection->commit();

            echo "Se registraron {$quantity} comentarios correctamente. \n";
        }
    }