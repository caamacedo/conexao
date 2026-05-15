<?php
require_once "conexao.php";

if (!function_exists("verify_usuario_password")) {
    function verify_usuario_password($senha, $hashArmazenado) {
        if (!is_string($senha) || !is_string($hashArmazenado) || $hashArmazenado === "") {
            return false;
        }
        if (function_exists("password_verify")) {
            return password_verify($senha, $hashArmazenado);
        }
        $calculado = crypt($senha, $hashArmazenado);
        if (!is_string($calculado) || strlen($calculado) !== strlen($hashArmazenado)) {
            return false;
        }
        if (function_exists("hash_equals")) {
            return hash_equals($hashArmazenado, $calculado);
        }
        return $calculado === $hashArmazenado;
    }
}

session_start();
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array("email" => $email));
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuario && verify_usuario_password($senha, $usuario["senha"])) {
        $_SESSION['usuario'] = $usuario['nome'];
        $_SESSION['tipo'] = $usuario['tipo'];
        header("Location: painel.php");
        exit();
    } else {
        $mensagem = "<p class='error'>Email ou senha inválidos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login - Biblioteca</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Login</h1>
    <?php echo $mensagem; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>