<?php
$host = 'db'; 
$db   = $_ENV['DB_NAME'];
$user = 'root';
$senha = $_ENV['DB_PASSWORD'];

try {
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    ];

    $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $senha, $options);
    
} catch (PDOException $e) {
    die("Erro de Conexão: " . $e->getMessage());
}
?>