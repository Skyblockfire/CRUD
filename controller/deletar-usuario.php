<?php
session_start();
require_once("../model/database.php");

$db = new Database();

if(($db->autentica_admin($_SESSION['CPF'])) && ($_SESSION['tipo'] == 1)){
    require_once("../model/user.php");

    $id = $_GET['id'];
    
    $db->deletar_usuario($id);

    echo '<script>alert("Usuario deletado!")</script>';
    echo '<script>location.href="../view/User.php"</script>';
}else{
    echo '<script>alert("Erro, você não é um administrador.")</script>';
    echo '<script>location.href="../view/home.php"</script>';
}
?>