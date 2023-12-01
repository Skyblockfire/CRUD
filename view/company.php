<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style> 
    #marge{
        margin-top: 20px;
    }
    </style>
    <title></title>
</head>
<body>
    <div class="container" id="marge">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalhes das empresas
                            <a href="addCompany.php" class="btn btn-success float-end ">Cadastrar Empresa</a>
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
                                                <td>{$row['id']}</td>
                                                <td>{$row['Nome_Fantasia']}</td>
                                                <td>{$row['Nome']}</td>
                                                <td>{$row['CNPJ']}</td>
                                                <td>{$row['Endereco']}</td>
                                                <td>{$row['Telefone']}</td>
                                                <td>{$row['Responsavel']}</td>";
                                        if($_SESSION['tipo']){echo"<td>
                                            <a href='altCompany.php?id={$row['id']}' class='btn btn-primary btn-sm'>Editar</a>
                                            <a href='../controller/delete-empresa.php?id={$row['id']}' class='btn btn-danger btn-sm'>Deletar</a>
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