<?php
    class ORM{
        protected $id;
        protected $table;
        protected $db;

        public function __construct($id, $table, PDO $connection){
            $this->id = $id;
            $this->table = $table;
            $this->db = $connection;
        }
        public function getAll(){
            $statement = $this->db->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            return $statement->fetchAll();
        }   
        public function getById($id){
            $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            return $statement->fetch();
        }
        public function deleteById($id){
            $statement = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
        }
        public function updateById($id, $data){
            $queryString = "UPDATE {$this->table} SET";

            foreach ($data as $key => $value) {
                $queryString .= "{$key} = :{$key},";
            }

            $queryString = trim($queryString, ',');
            $queryString .= "WHERE id = :id";
            $statement = $this->db->prepare($queryString);

            foreach ($data as $key => $value) {
                $statement->bindValue(":{$key}", $value);
            }

            $statement->bindValue(":id", $id);
            $statement->execute();
        }
        public function insert($data){
            $queryString = "INSERT INTO {$this->table} (";

            foreach ($data as $key => $value) {
                $queryString .= "{$key},";
            }

            $queryString = trim($queryString, ',');
            $queryString .= ") VALUES (";

            foreach ($data as $key => $value) {
                $queryString .= ":{$key},";
            }

            $queryString = trim($queryString, ',');
            $queryString .= ")";
            $statement = $this->db->prepare($queryString);

            foreach ($data as $key => $value) {
                $statement->bindValue(":{$key}", $value);
            }
            
            $statement->execute();
        }
        public function paginate($page, $limit){
            $offset = ($page - 1) * $limit;
            $rows = $this->db->query("SELECT COUNT(*) FROM {$this->table}")->fetchColumn();
            $queryString = "SELECT {$this->tabla} LIMIT {$offset}, {$limit}";
            $statement = $this->db->prepare($queryString);
            $statement->execute();
            $data = $statement->fetchAll();

            $pages = (int)ceil($rows / $limit);

            return [
                'data' => $data,
                'page' => $page,
                'limit' => $limit,
                'pages' => $pages,
                'rows' => $rows
            ];


        }
    }
    
