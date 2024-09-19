<?php
    define('USER', 'user100_db');
    define('PASSWORD', 'user100');
    define('HOST', '127.0.0.1');
    define('DATABASE', 'user100_db');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>