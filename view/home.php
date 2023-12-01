<?php
session_start();

if(isset($_SESSION["CPF"])){
    echo "Seja bem vindo {$_SESSION['nome']}";

}else{
    echo'<script>location.href="index.html";</script>';
}
?>
<title>Homepage</title>
<a href="user.php">Usuários</a>
<a href="company.php">Empresas</a>
<a href="../controller/logout.php">Logout</a>