<?php

$host= "localhost";
$banco = "biblioteca";
$usuario = "root";
$senha = "usbw";
$porta = "3307";

try{
    $pdo =  new PDO("mysql:host=$host;port=$porta;dbname=$banco;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Erro de conexão: " . $e->getMessage());
}

?>