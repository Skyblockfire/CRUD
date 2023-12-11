<?php
session_start();
require_once("../model/database.php");

$db = new Database();

if(($db->autentica_admin($_SESSION['CPF'])) && ($_SESSION['tipo'] == 1)){

    $id = $_GET['id_empresa'];
    
    $db->deletar_empresa($id);

    echo '<script>alert("Empresa deletada!")</script>';
    echo '<script>location.href="../view/Company.php"</script>';
}else{
    echo '<script>alert("Erro, você não é um administrador.")</script>';
    echo '<script>location.href="../view/home.php"</script>';
}
?>