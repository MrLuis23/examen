<?php 
    require_once(__DIR__ . '/../autoload.php');
    require_once(__DIR__ . '/../models/Category.php');


    function jsonFileToArray($file, $fieldName){
        $json_content = file_get_contents($file);
        $data = json_decode($json_content, JSON_PRETTY_PRINT);
        return count($data[$fieldName]) ?  $data[$fieldName] : [];
    }
    function jsonFileToString($file, $fieldName){
        $json_content = file_get_contents($file);
        $result = json_decode($json_content, JSON_PRETTY_PRINT)[$fieldName];
        return $result;
    }

    function getRandomProduct(){ 
        $db = new Database(true);
        $connection = $db->getConnection();
        $queryString = "SELECT id FROM products ORDER BY RAND() LIMIT 1;";
        $statement = $connection->prepare(
                $queryString
        );
        $statement->execute();
        return (int)$statement->fetch()['id'];   
    }
    function getRandomFullName(){
        $time = time();
        mt_srand($time);
        $nombres = jsonFileToArray(__DIR__ .'/../../install/nombres.json', 'nombres');
        $apellidos = jsonFileToArray(__DIR__ .'/../../install/apellidos.json', 'apellidos');
        $numNames = count($nombres);
        $numApellidos = count($apellidos);

        return $nombres[mt_rand(0, $numNames - 1)] . " ". $apellidos[mt_rand(0, $numApellidos - 1)];
    }
    function getRandomProductRate(){
        $time = time();
        mt_srand($time);
        return mt_rand(0, 5);
    }
    function getRandomComment(){
        $time = time();
        mt_srand($time);
        $text = explode(" ", jsonFileToString(__DIR__ .'/../../install/lorem-ipsum.json', 'text'));
        $totalWords = count($text);
        $numberWords = mt_rand(10, 50);
        $index = mt_rand(0, $totalWords - $numberWords);

        return implode(" ", array_slice($text, $index, $numberWords));
    }

    function getRandomProductName($category_id){
        $time = time();
        mt_srand($time);
        $names = jsonFileToArray(__DIR__ .'/../../install/nombres_productos.json', 'names');
        $names = array_filter($names, function($name) use($category_id){
            return $name['category_id'] == $category_id;
        });
        $names = array_values($names);
        $index = count($names) - 1;

        return $names[mt_rand(0, $index)]['name'];
    }
    function getRandomProductSpecification($category_id){
        $time = time();
        mt_srand($time);
        $specifications = jsonFileToArray( __DIR__ .'/../../install/specifications.json', 'specifications');
        $specifications = array_filter($specifications, function($spec) use($category_id){
            return $spec['category_id'] == $category_id;
        });
        $specifications = array_values($specifications);
        $index = count($specifications) - 1;

        return $specifications[mt_rand(0, $index - 1)]['specification'];
    }
    function getRandomProductBrand($category_id){
        $time = time();
        mt_srand($time);
        $brands = jsonFileToArray(__DIR__ .'/../../install/brands.json', 'brands');
        $brands = array_filter($brands, function($brand) use($category_id){
            return $brand['category_id'] == $category_id;
        });
        $brands = array_values($brands);
        $index = count($brands) - 1;

        return $brands[mt_rand(0, $index - 1)]['brand'];
    }
    function getRandomProductModel(){
        $time = time();
        mt_srand($time);
        $models = jsonFileToArray(__DIR__ .'/../../install/models.json', 'models');
        $index = count($models) - 1;

        return $models[mt_rand(0, $index - 1)];
    }
    function getRandomProductPrice(){
        $time = time();
        mt_srand($time);
        return round(mt_rand(10000.0, 60000.0) * 1.0, 2);
    }
