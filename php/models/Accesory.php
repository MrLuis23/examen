<?php
    class Accesory extends ORM{
        public function  __construct(PDO $connection){
            try {
                parent::__construct('id', 'accesories', $connection);
            } catch (\Throwable $th) {
                echo $th;
            }
            
        }
    }