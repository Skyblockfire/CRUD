<?php
session_start();

if(isset($_SESSION["CPF"])){
    echo "Seja bem vindo {$_SESSION['nome']}";

}else{
    echo'<script>location.href="index.html";</script>';
}
?>
<title>Homepage</title>
<a href="addUser.php">Cadastrar user</a>
<a href="altUser.php">Alterar user</a>
<a href="../controller/logout.php">Logout</a>