<?php

session_start();

if(isset($_SESSION["CPF"])){
    echo "Seja bem vindo {$_SESSION['nome']}";
}else{
    echo'<script>location.href="index.html";</script>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg flex-column bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand me-auto" style="user-select: none;"><?php if($_SESSION['tipo']){echo 'Admin';} else {echo 'Usuario';} ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="user.php">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="company.php">Empresas</a>
        </li>
      </ul>
    </div>
    <a class="nav-link active" aria-current="page" href="../controller/logout.php">Logout</a>
  </div>
</nav>
</body>
</html>


<title>Homepage</title>
<a href="user.php">Usuários</a>
<a href="company.php">Empresas</a>
<a href="../controller/logout.php">Logout</a>