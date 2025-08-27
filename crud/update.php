<?php
// update.php

require 'db.php';

$id = $_GET['id'] ?? null;

// Se não houver ID na URL, redireciona para a página inicial
if (!$id) {
    header('Location: index.php');
    exit;
}

// Busca o usuário no banco de dados
$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Se o usuário não for encontrado, redireciona
if (!$usuario) {
    header('Location: index.php');
    exit;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Prepara e executa a query de atualização
    $sql_update = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
    $stmt_update = $pdo->prepare($sql_update);
    $stmt_update->execute([$nome, $email, $id]);

    // Redireciona para a página inicial
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Usuário</h1>
        <form action="update.php?id=<?= $usuario['id'] ?>" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
            
            <button type="submit" class="btn">Atualizar</button>
            <a href="index.php">Cancelar</a>
        </form>
    </div>
</body>
</html>