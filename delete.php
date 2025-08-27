<?php
// delete.php

require 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // Prepara e executa a query de exclusão
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

// Redireciona para a página inicial independentemente do resultado
header('Location: index.php');
exit;
?>