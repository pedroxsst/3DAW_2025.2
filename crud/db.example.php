<?php
// db.example.php

$host = 'localhost'; 
$dbname = 'crud_php'; // Coloque o nome do seu banco de dados
$username = 'root'; // Coloque seu usuário do banco de dados
$password = ''; // Coloque sua senha do banco de dados

// --- Não altere o código abaixo ---
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
?>