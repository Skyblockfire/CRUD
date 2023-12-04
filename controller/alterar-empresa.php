<?php
//Adicionar verificação de se os dados não foram passados vazios [É possível remover o REQUIRED apartir do inspecionar elemento.]
session_start();
require_once("../model/database.php");

$db = new Database();

if(($db->autentica_admin($_SESSION['CPF'])) && ($_SESSION['tipo'] == 1)){
    if(empty($_POST["nome"]) || empty($_POST["nome_fantasia"]) || empty($_POST["CNPJ"]) || empty($_POST["endereco"]) || empty($_POST["telefone"]) || empty($_POST["responsavel"])){
        if(empty($_POST["nome"])){
            echo '<script>alert("Campo Nome em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["nome_fantasia"])){
            echo '<script>alert("Campo Nome Fantasia em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["CNPJ"])){
            echo '<script>alert("Campo CNPJ em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["endereco"])){
            echo '<script>alert("Campo Endereço em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["telefone"])){
            echo '<script>alert("Campo Telefone em branco, preencha corretamenta.")</script>';
        }elseif(empty($_POST["responsavel"])){
            echo '<script>alert("Campo Responsável em branco, preencha corretamenta.")</script>';
        }
        echo '<script>location.href="../view/addCompany.php"</script>';;
    }else{
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
    echo '<script>location.href="../view/addCompany.php"</script>';}
}else{
    echo '<script>alert("Erro, você não é um administrador.")</script>';
    echo '<script>location.href="../view/home.php"</script>';
}


?>