<?php 
    session_start();
    
    require_once("../model/database.php");

    if(empty($CPF = $_POST['CPF']) || empty(($Senha = $_POST['Senha']))){
    session_destroy();
    echo '<script>alert("Algum campo está vazio.")</script>';
    echo "<script>location.href = '../view/index.html'</script>";
    exit();
    }else{
        $db = new Database();
        if($db->verificar_login($CPF, $Senha)){
            $_SESSION['CPF'] = $CPF;
            echo '<script>location.href="../view/home.php"</script>';
        }else{
           echo '<script>alert("Login Inválido")</script>';
           echo '<script>location.href="../view/index.html"</script>';
        }
    }    
    
?>