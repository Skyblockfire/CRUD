<?php
session_start();
require_once("../model/database.php");

$db = new Database();

if(($db->autentica_admin($_SESSION['CPF'])) && ($_SESSION['tipo'] == 1)){
    if(empty($_POST["nome"]) || empty($_POST["sobrenome"]) || empty($_POST["senha"]) || empty($_POST["CPF"]) || empty($_POST["CNH"]) || empty($_POST["telefone"]) || empty($_POST["endereco"]) || empty($_POST["carro"])){
        if(empty($_POST["nome"])){
            echo '<script>alert("Campo Nome em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["sobrenome"])){
            echo '<script>alert("Campo Sobrenome em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["senha"])){
            echo '<script>alert("Campo Senha em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["CPF"])){
            echo '<script>alert("Campo CPF em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["CNH"])){
            echo '<script>alert("Campo CNH em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["telefone"])){
            echo '<script>alert("Campo Telefone em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["endereco"])){
            echo '<script>alert("Campo Endereço em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["carro"])){
            echo '<script>alert("Campo Carro em branco, preencha corretamenta.")</script>';
        }
        echo '<script>location.href="../view/addUser.php"</script>';
        }else{
    require_once("../model/user.php");

    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $senha = $_POST["senha"];
    $cpf = $_POST["CPF"];
    $cnh = $_POST["CNH"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $carro = $_POST["carro"];
    
    $user = new User($nome, $sobrenome, $senha, $cpf, $cnh, $telefone, $endereco, $carro, $id_empresa);
    
    $db->alterar_usuario($user,$_POST['id']);

    echo '<script>alert("Usuario atualizado!")</script>';
    echo '<script>location.href="../view/user.php"</script>';
}
}else{
    echo '<script>alert("Erro, você não é um administrador.")</script>';
    echo '<script>location.href="../view/home.php"</script>';
}
?>