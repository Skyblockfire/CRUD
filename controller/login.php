<?php 
    session_start();

    include ("userDAO.php");

    if(empty($CPF = $_POST['CPF']) || empty($_POST['Senha'])){
    session_destroy();
    header('index.html');
    exit();
    }
    
    
?>