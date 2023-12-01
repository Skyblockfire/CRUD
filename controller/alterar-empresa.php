<?php
//Adicionar verificação de se os dados não foram passados vazios [É possível remover o REQUIRED apartir do inspecionar elemento.]
session_start();
require_once("../model/database.php");

$db = new Database();

if(($db->autentica_admin($_SESSION['CPF'])) && ($_SESSION['tipo'] == 1)){
    require_once("../model/company.php");

    $nome = $_POST["nome"];
    $nome_fantasia = $_POST["nome_fantasia"];
    $cnpj = $_POST["CNPJ"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $responsavel = $_POST["responsavel"];
    
    $company = new Empresa($nome, $nome_fantasia, $cnpj, $endereco, $telefone, $responsavel);
    
    $db->alterar_empresa($company,$_POST['id_empresa']);
    
    echo '<script>alert("Empresa alterada!")</script>';
    echo '<script>location.href="../view/addCompany.php"</script>';
}else{
    echo '<script>alert("Erro, você não é um administrador.")</script>';
    echo '<script>location.href="../view/home.php"</script>';
}


?>