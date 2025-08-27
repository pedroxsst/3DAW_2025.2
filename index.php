<?php
// index.php

// Inclui o arquivo de conexão com o banco de dados
require 'db.php';

// Prepara e executa a query para selecionar todos os usuários
$stmt = $pdo->query('SELECT * FROM usuarios ORDER BY nome ASC');

// Busca todos os resultados como um array associativo
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD em PHP</title>
    
    <style>
        /* style.css */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #0056b3;
        }

        a {
            color: #0056b3;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .btn:hover {
            background: #0056b3;
        }

        .btn-edit {
            background: #28a745;
            padding: 5px 10px;
            color: #fff;
            border-radius: 3px;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background: #218838;
        }

        .btn-delete {
            background: #dc3545;
            padding: 5px 10px;
            color: #fff;
            border-radius: 3px;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Usuários</h1>
        <a href="create.php" class="btn">Adicionar Novo Usuário</a>
        
        <?php if (count($usuarios) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario['nome']) ?></td>
                            <td><?= htmlspecialchars($usuario['email']) ?></td>
                            <td>
                                <a href="update.php?id=<?= $usuario['id'] ?>" class="btn-edit">Editar</a>
                                <a href="delete.php?id=<?= $usuario['id'] ?>" class="btn-delete" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum usuário cadastrado.</p>
        <?php endif; ?>
    
    </div>
</body>
</html>