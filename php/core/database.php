<?php
    require_once(__DIR__ . '/../autoload.php');
    class DataBase{
        private $connection;
        public function __construct($initDB){
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            
            if($initDB)
                $dataSource = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            else 
                $dataSource = "mysql:host=" . DB_HOST;

            $this->connection = new PDO(
                $dataSource,
                DB_USER,
                DB_PASS,
                $options
            );
            // VAR_DUMP($this->connection);exit;
            try {
                $this->connection->exec("SET CHARACTER SET UTF8");
            } catch (\Throwable $th) {
                //throw $th;
                echo $th;
            }
            // echo 'success';
        }
        public function getConnection(){
            return $this->connection;
        }

        public function closeConnection(){
            $this->connection = null;
        }
    }