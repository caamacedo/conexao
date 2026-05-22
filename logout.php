
<?php
// Inicia a sessão para poder acessar os dados dela
session_start();

// Apaga todos os dados da sessão (desloga o usuário)
session_destroy();

// Redireciona o usuário de volta para a página de login (index.php)
header("Location: index.php");

// Encerra o script para garantir que o redirecionamento aconteça sem continuar executando código
exit;
?>
