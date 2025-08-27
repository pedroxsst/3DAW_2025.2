<?php
// create.php

require 'db.php';

// Verifica se o formulário foi enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Validação simples
    if (!empty($nome) && !empty($email)) {
        try {
            // Prepara a query de inserção para evitar SQL Injection
            $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);

            // Executa a query, passando os valores
            $stmt->execute([$nome, $email]);

            // Redireciona para a página inicial após o sucesso
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
        }
    } else {
        $error = "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Novo Usuário</h1>
        
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <form action="create.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <button type="submit" class="btn">Salvar</button>
            <a href="index.php">Cancelar</a>
        </form>
    </div>
</body>
</html>