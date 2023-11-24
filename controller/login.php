<?php 
    session_start();

    require_once("../model/database.php");

    if(empty($CPF = $_POST['CPF']) || empty(($Senha = $_POST['Senha']))){
    session_destroy();
    header('../view/index.html');
    exit();
    }else{
        $db = new Database();
        if($db->verificar_login($CPF, $Senha)){
            echo $_SESSION['name'];
        }else{
           echo '<script>alert("Login Inválido")</script>';
           echo '<script>location.href="../view/index.html"</script>';
        }
    }    
    
?>