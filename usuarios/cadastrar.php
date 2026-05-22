<?php
require '../conexao.php';
$mensagem = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome=trim($_POST["nome"]);
    $email=trim($_POST["email"]);    
    $senha=password_hash($_POST["senha"],PASSWORD_DEFAULT);
    $tipo = $_POST["tipo"];
    try{
        $sql="INSERT INTO usuarios (nome, email, senha, tipo)
        VALUES (:nome, :email, :senha, :tipo)";
        $smtp = $pdo->prepare($sql);
        $smtp->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha,
            ':tipo' => $tipo,    
        ]);
        header("Location:../painel.php");
        exit();
    }
    catch(PDOException $e){
        $mensagem = "<p class='erro'>Erro ao cadastrar: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastrar Usuário</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <h1>Cadastrar Usuário</h1>
    <?php echo $mensagem; ?>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <select name="tipo" required>
            <option value="admin">Admin</option>
            <option value="aluno">Aluno</option>
        </select>
        <button type="submit">Cadastrar</button>
    </form>
</div>
</body>
</html>
 