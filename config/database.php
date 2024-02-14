<?php
session_start();

require_once (__DIR__ . '/global.php');

try {

    $dbName = DB_NAME;
    $dbHost = DB_HOST;
    
    $dsn = "mysql:host=$dbHost;port=3306;dbname=$dbName;charset=utf8";
    
    $access=new pdo($dsn, DB_USER, DB_PASSWORD);
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (PDOException $e) {
    echo "". $e->getMessage();
}