<?php
//Ler o comentário no adicionar-empresa.php
session_start();
require_once("../model/database.php");

$db = new Database();

if(($db->autentica_admin($_SESSION['CPF'])) && ($_SESSION['tipo'] == 1)){
    require_once("../model/user.php");

    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $senha = $_POST["senha"];
    $cpf = $_POST["CPF"];
    $cnh = $_POST["CNH"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $carro = $_POST["carro"];
    
    $user = new User($nome, $sobrenome, $senha, $cpf, $cnh, $telefone, $endereco, $carro);
    
    $db->cadastrar_usuario($user);
    
    echo '<script>alert("Usuario cadastrado!")</script>';
    echo '<script>location.href="../view/addUser.php"</script>';
}else{
    echo '<script>alert("Erro, você não é um administrador.")</script>';
    echo '<script>location.href="../view/home.php"</script>';
}


?>