<?php
require '../conexao.php';
$id = $_GET["id"];
try{
    $sql="DELETE FROM usuarios WHERE id = :id";
    $smtp = $pdo->prepare($sql);
    $smtp->execute([':id' => $id
    ]);
    header("Location:../painel.php");
    exit();
}
catch(PDOException $e){
    $mensagem = "<p class='erro'>Erro ao excluir: " . $e->getMessage() . "</p>";
}