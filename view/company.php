<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" style="user-select: none;color:white;font-weight:900;"><?php if($_SESSION['tipo']){echo 'Admin';} else {echo 'Usuario';} ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php if($_SESSION['tipo']){echo'<li class="nav-item">
          <a class="nav-link active" style="color:white;font-weight:600;" aria-current="page" href="user.php">Usuários</a>
        </li>';}else?>
        <li class="nav-item">
          <a class="nav-link" style="color:white;font-weight:600;" href="company.php">Empresas</a>
        </li>
      </ul>
    </div>
    <a class="nav-link active" aria-current="page" style="color:white;"href="../controller/logout.php">Logout</a>
  </div>
</nav>
<!-- INÍCIO SITE -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style> 
    #marge{
        margin-top: 20px;
    }
    
    body{
        background-image: url(imagens/conexoes.jpg);
        background-size: cover;
    }
    </style>
    <title>Empresas</title>
</head>
<body>
    <div class="container" id="marge">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalhes das empresas
                           <?php if($_SESSION['tipo']) echo '<a href="addCompany.php" class="btn btn-success float-end ">Cadastrar Empresa</a>'?>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Fantasia</th>
                                    <th>Nome</th>
                                    <th>CNPJ</th>
                                    <th>Endereço</th>
                                    <th>Telefone</th>
                                    <th>Responsavel</th>                                    
                                  <?php if($_SESSION['tipo']){echo '<th>Ações</th>';}?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include("../model/database.php");
                                    $db = new Database();
                                    $resultado = $db->viewCompany(1);
                                    foreach($resultado as $row){
                                        echo"<tr>
                                                <td>{$row['id_empresa']}</td>
                                                <td>{$row['Nome_Fantasia']}</td>
                                                <td>{$row['Nome']}</td>
                                                <td>{$row['CNPJ']}</td>
                                                <td>{$row['Endereco']}</td>
                                                <td>{$row['Telefone']}</td>
                                                <td>{$row['Responsavel']}</td>";
                                        if($_SESSION['tipo']){echo"<td>
                                            <a href='altCompany.php?id_empresa={$row['id_empresa']}' class='btn btn-primary btn-sm'>Editar</a>
                                            <a href='../controller/deletar-empresa.php?id_empresa={$row['id_empresa']}' class='btn btn-danger btn-sm'>Deletar</a>
                                            </td>
                                        </tr>";}else{
                                            echo "</tr>";
                                        };
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
if(isset($_SESSION["CPF"])){

}else{
    echo'<script>location.href="index.html";</script>';
}
?>
</html>