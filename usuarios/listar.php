<?php
require '../conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lista de Usuários</title>
<link rel="stylesheet" href="../CSS/style.css">
 
 
</head>
<body>
 
<div class="lista-container">
    <h1>Lista de Usuários</h1>
 
    <!-- BOTÃO VOLTAR -->
    <a class="btn-voltar" href="../painel.php">Voltar para o Painel</a>
 
    <table class="tabela-usuarios">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
 
        <tbody>
            <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['nome'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= ucfirst($u['tipo']) ?></td>
                <td>
                    <a class="btn-editar" href="editar.php?id=<?= $u['id'] ?>">Editar</a>
                    <a class="btn-excluir" href="excluir.php?id=<?= $u['id'] ?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
 
</body>
</html>