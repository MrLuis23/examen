<?php
    require_once(__DIR__ . '/../php/autoload.php');
    require_once(__DIR__ . '/../php/models/Product.php');
    require_once(__DIR__ . '/../php/models/Category.php');
    require_once(__DIR__ . '/../php/models/Comment.php');
    require_once(__DIR__ . '/../php/models/Accesory.php');


    $dir = __DIR__;
    $files = scandir($dir);
    $files = array_diff($files, array('.', '..'));
    $files = array_filter($files, function($file) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'sql';
    });

    $files = array_values($files);
    // REALIZAMOS LA CONEXION A MYSQL ESPECIALMENTE PARA CREAR LA BD
    $db = new DataBase(false);
    $connection = $db->getConnection();
    if (!$connection)
        exit("Hubo un error al crear la conexion con la BD");

    $connection->beginTransaction();
    try {
        $connection->exec("DROP DATABASE IF EXISTS " . DB_NAME . ";");
        $connection->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME . ";");
    } catch (PDOException $e) {
        $connection->rollBack();
        exit("Error al ejecutar las consultas: " . $e->getMessage());
    }
    
    // $connection->commit();
    echo "BD CREADA CON EXITO \n";

    // CREAMOS UNA CONEXION NUEVA AHORA SI UTILIZANDO LA BD
    $db = new DataBase(true);
    $connection = $db->getConnection();
    
    if (!$connection)
        exit("Hubo un error al crear la conexion con la BD");


    $connection->beginTransaction();
    foreach ($files as $file) {
        echo "Archivo: " . $file . "\n";
        $rawData = file_get_contents($file);
    
        echo stripos($rawData, 'CREATE FUNCTION'); 
        if (stripos($rawData, 'CREATE FUNCTION') === 0){
            $queries = [$rawData];
        }else{ 
            $queries = explode(';', $rawData);
        }
        
        foreach ($queries as $query) {
            $query = trim($query);
            if (!empty($query)) {
                try {
                    $connection->exec($query);
                } catch (PDOException $e) {
                    $connection->rollBack();
                    echo $query . "\n";
                    exit("Error al ejecutar las consultas: " . $e->getMessage());
                }
            }
        }
        echo "Todas las consultas se ejecutaron correctamente. \n";
    }

    // REGISTRAMOS 10 CATEGORIAS ADICIONALES
    $newCategories = [
        ['name' => 'Componentes Internos', 'parent_category_id' => NULL],
        ['name' => 'Placas Base', 'parent_category_id' => 11],
        ['name' => 'Tarjetas Gráficas', 'parent_category_id' => 11],
        ['name' => 'Memoria RAM', 'parent_category_id' => 11],
        ['name' => 'Discos Duros', 'parent_category_id' => 11],
        ['name' => 'Accesorios de Oficina', 'parent_category_id' => NULL],
        ['name' => 'Sillas Ergonómicas', 'parent_category_id' => 16],
        ['name' => 'Escritorios', 'parent_category_id' => 16],
        ['name' => 'Soportes para Monitores', 'parent_category_id' => 16],
        ['name' => 'Dispositivos de Almacenamiento', 'parent_category_id' => NULL],
    ];

    $categoryModel = new Category($connection);
    foreach ($newCategories as $category) {
        try{
            $categoryModel->insert($category);
        } catch (PDOException $e) {
            $connection->rollBack();
            echo $query . "\n";
            exit("Error al ejecutar las consultas: " . $e->getMessage());
        }
    }
    echo "Se registraron 10 categorias adicionales correctamente. \n";

    $newProducts = [
        [
            'name' => 'Laptop Ultraligera',
            'model' => 'Dell XPS 13',
            'specifications' => 'Intel Core i7, 16GB RAM, 512GB SSD, pantalla 13.3" FHD',
            'price' => 32999.00,
            'brand' => 'Dell',
            'main_category_id' => 6,
            'num_views' => 0,
            'num_likes' => 0
        ],
        [
            'name' => 'Computadora de Juegos',
            'model' => 'Acer Predator Orion 3000',
            'specifications' => 'Intel Core i5, 16GB RAM, 1TB HDD, NVIDIA GTX 1660',
            'price' => 24999.00,
            'brand' => 'Acer',
            'main_category_id' => 5,
            'num_views' => 0,
            'num_likes' => 0
        ],
        [
            'name' => 'Monitor Curvo',
            'model' => 'LG 34WN80C-B',
            'specifications' => '34", UltraWide QHD, IPS, HDR10',
            'price' => 15999.00,
            'brand' => 'LG',
            'main_category_id' => 9,
            'num_views' => 0,
            'num_likes' => 0
        ],
        [
            'name' => 'Teclado Gaming',
            'model' => 'Razer BlackWidow V3',
            'specifications' => 'Switches mecánicos, retroiluminado RGB, USB',
            'price' => 3499.00,
            'brand' => 'Razer',
            'main_category_id' => 7,
            'num_views' => 0,
            'num_likes' => 0
        ],
        [
            'name' => 'Ratón Ergonomico',
            'model' => 'Logitech MX Vertical',
            'specifications' => 'Diseño vertical, 4000 DPI, conexión Bluetooth',
            'price' => 2499.00,
            'brand' => 'Logitech',
            'main_category_id' => 8,
            'num_views' => 0,
            'num_likes' => 0
        ],
        [
            'name' => 'Impresora Multifuncional',
            'model' => 'Canon PIXMA TR8620',
            'specifications' => 'Impresión, escaneo, copia, Wi-Fi, pantalla táctil',
            'price' => 4999.00,
            'brand' => 'Canon',
            'main_category_id' => 10,
            'num_views' => 0,
            'num_likes' => 0
        ],
        [
            'name' => 'Laptop 2 en 1',
            'model' => 'HP Spectre x360',
            'specifications' => 'Intel Core i7, 16GB RAM, 1TB SSD, pantalla táctil 15.6"',
            'price' => 39999.00,
            'brand' => 'HP',
            'main_category_id' => 6,
            'num_views' => 0,
            'num_likes' => 0
        ],
        [
            'name' => 'Laptop de Negocios',
            'model' => 'Lenovo ThinkPad X1 Carbon',
            'specifications' => 'Intel Core i7, 16GB RAM, 1TB SSD, pantalla 14" FHD',
            'price' => 42999.00,
            'brand' => 'Lenovo',
            'main_category_id' => 6,
            'num_views' => 0,
            'num_likes' => 0
        ],
        [
            'name' => 'Monitor 4K',
            'model' => 'BenQ PD3220U',
            'specifications' => '32", 4K UHD, IPS, 95% P3',
            'price' => 19999.00,
            'brand' => 'BenQ',
            'main_category_id' => 9,
            'num_views' => 0,
            'num_likes' => 0
        ],
        [
            'name' => 'Teclado Ergonomico',
            'model' => 'Microsoft Sculpt Ergonomic',
            'specifications' => 'Diseño dividido, soporte para muñeca, conexión inalámbrica',
            'price' => 2999.00,
            'brand' => 'Microsoft',
            'main_category_id' => 7,
            'num_views' => 0,
            'num_likes' => 0
        ]
    ];

    $productModel = new Product($connection);
    foreach ($newProducts as $product) {
        try{
            $productModel->insert($product);
        } catch (PDOException $e) {
            $connection->rollBack();
            echo $query . "\n";
            exit("Error al ejecutar las consultas: " . $e->getMessage());
        }
    }
    
    echo "Se registraron 10 productos adicionales correctamente. \n";
    $newComments = [
        [
            'text' => 'La laptop es increíble, la mejor que he tenido.',
            'user_name' => 'Laura Fernández',
            'product_id' => 1,
            'product_rate' => 5
        ],
        [
            'text' => 'Buena computadora, pero el ventilador es un poco ruidoso.',
            'user_name' => 'María López',
            'product_id' => 2,
            'product_rate' => 4
        ],
        [
            'text' => 'El monitor tiene una calidad de imagen excepcional.',
            'user_name' => 'Roberto Martínez',
            'product_id' => 3,
            'product_rate' => 5
        ],
        [
            'text' => 'La laptop 2 en 1 es muy versátil y fácil de usar.',
            'user_name' => 'Claudia Reyes',
            'product_id' => 17,
            'product_rate' => 5
        ],
        [
            'text' => 'El teclado es muy cómodo, pero el precio es un poco alto.',
            'user_name' => 'Elena González',
            'product_id' => 4,
            'product_rate' => 4
        ],
        [
            'text' => 'La laptop de negocios es rápida y eficiente.',
            'user_name' => 'Miguel Torres',
            'product_id' => 18,
            'product_rate' => 4
        ],
        [
            'text' => 'Gran monitor, la curvatura mejora la experiencia de juego.',
            'user_name' => 'Javier Sánchez',
            'product_id' => 7,
            'product_rate' => 5
        ],
        [
            'text' => 'Teclado inalámbrico muy práctico, aunque la batería dura poco.',
            'user_name' => 'Patricia Díaz',
            'product_id' => 8,
            'product_rate' => 3
        ],
        [
            'text' => 'Computadora todo en uno muy funcional, ideal para el hogar.',
            'user_name' => 'Gabriela Jiménez',
            'product_id' => 10,
            'product_rate' => 4
        ],
        [
            'text' => 'El monitor 4K tiene una calidad de imagen impresionante.',
            'user_name' => 'Fernando Silva',
            'product_id' => 19,
            'product_rate' => 5
        ]
    ];

    $commentModel = new Comment($connection);
    foreach ($newComments as $comment) {
        try{
            $commentModel->insert($comment);
        } catch (PDOException $e) {
            $connection->rollBack();
            echo $query . "\n";
            exit("Error al ejecutar las consultas: " . $e->getMessage());
        }
    }

    echo "Se registraron 10 comentarios adicionales correctamente. \n";
    $accessories = [
        ['product_id' => 4, 'category_id' => 7],  // Teclado Mecánico
        ['product_id' => 5, 'category_id' => 8],  // Ratón Inalámbrico
        ['product_id' => 8, 'category_id' => 7],  // Teclado Inalámbrico
        ['product_id' => 9, 'category_id' => 8],  // Ratón Gaming
        ['product_id' => 14, 'category_id' => 7], // Teclado Gaming
        ['product_id' => 15, 'category_id' => 8], // Ratón Ergonómico
        ['product_id' => 6, 'category_id' => 10], // Impresora
        ['product_id' => 16, 'category_id' => 10], // Impresora Multifuncional
        ['product_id' => 3, 'category_id' => 9],  // Monitor
        ['product_id' => 19, 'category_id' => 9], // Monitor 4K
    ];

    $accesoryModel = new Accesory($connection);
    foreach ($accessories as $accesory) {
        try{
            $accesoryModel->insert($accesory);
        } catch (PDOException $e) {
            $connection->rollBack();
            echo $query . "\n";
            exit("Error al ejecutar las consultas: " . $e->getMessage());
        }
    }

    echo "Se registraron 10 accesorios correctamente. \n";


    $productModel->createRandomProducts(200);
    $commentModel->createRandomComments(1000);
    $connection->commit();
    $db->closeConnection();
    