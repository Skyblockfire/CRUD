<?php
session_start();
require_once("../model/database.php");

$db = new Database();

if(($db->autentica_admin($_SESSION['CPF'])) && ($_SESSION['tipo'] == 1)){
    require_once("../model/company.php");

    $nome = $_POST["nome"];
    $nome_fantasia = $_POST["nome_fantasia"];
    $senha = $_POST["senha"];
    $cpf = $_POST["CPF"];
    $cnh = $_POST["CNH"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $carro = $_POST["carro"];
    
    $company = new Empresa($nome, $nome_fantasia, $cnpj, $endereco, $telefone, $responsavel);
    
    $db->cadastrar_empresa($company);
    
    echo '<script>alert("Empresa cadastrada!")';
    echo '<script>location.href="../view/addCompany.php"</script>';
}else{
    echo '<script>alert("Erro, você não é um administrador.")';
    echo '<script>location.href="../view/home.php"</script>';
}


?>