<?php 
    $folderPath = dirname($_SERVER['SCRIPT_NAME']);
    $urlPath = $_SERVER['REQUEST_URI'] ?? '';
    $url = substr($urlPath, strlen($folderPath) - 1);


    define('URL', $urlPath);
    define('DB_HOST', 'localhost'); // Cambia esto si tu base de datos está en otro servidor
    define('DB_USER', 'root'); // Tu nombre de usuario de la base de datos
    define('DB_PASS', 'pass'); // Tu contraseña de la base de datos
    define('DB_NAME', 'eshopa'); // El nombre de tu base de datos