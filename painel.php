<?php
session_start();
 
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Painel</title>
<link rel="stylesheet" href="./style.css">
</head>
<body>
 
<!-- TÍTULO FORA DA CONTAINER -->
<h1 class="titulo">
    Bem-vindo, <?php echo $_SESSION['usuario']; ?>!
</h1>
 
<!-- MENU OCUPANDO TODA LARGURA -->
<nav class="menu">
 
    <div class="dropdown">
        <button class="dropbtn">Usuários</button>
        <div class="dropdown-content">
            <a href="usuarios/cadastrar.php">Cadastrar Usuário</a>
            <a href="usuarios/listar.php">Listar Usuários</a>
        </div>
    </div>
 
    <div class="dropdown">
        <button class="dropbtn">Livros</button>
        <div class="dropdown-content">
            <a href="livros/cadastrar.php">Cadastrar Livro</a>
            <a href="livros/listar.php">Listar Livros</a>
        </div>
    </div>
 
    <div class="dropdown">
        <button class="dropbtn">Aluguéis</button>
        <div class="dropdown-content">
            <a href="alugueis/cadastrar.php">Alugar Livro</a>
            <a href="alugueis/listar.php">Listar Aluguéis</a>
        </div>
    </div>
 
    <a href="logout.php" class="logout">Sair</a>
 
</nav>
 
<!-- CONTAINER SOMENTE PARA CONTEÚDO -->
 
 
</body>
</html>