<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        body{
            background-image: url(imagens/hexagono.jpg);
            background-size: cover;
        }
    </style>
    <title>Adicionar Usuario</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Usuario
                        <a href="user.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" action="../controller/adicionar-usuario.php" method="POST">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Sobrenome</label>
                                <input type="text" name="sobrenome" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Senha</label>
                                <input type="text" name="senha" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>CPF</label>
                                <input type="number" name="CPF" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>CNH</label>
                                <input type="number" name="CNH" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="number" name="telefone" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Endereço</label>
                                <input type="text" name="endereco" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label>Carro</label>
                                <input type="text" name="carro" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Empresa</label>
                            <select name="empresa" class="form-control">
                                <?php 
                                include("../model/database.php");
                                $db = new Database();

                                $resultado = $db->viewUserCompany();

                                foreach($resultado as $row){
                                    echo "<option value='". $row['id_empresa']."'>";
                                    echo $row['Nome']."</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="add" class="btn btn-primary">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    session_start();
    if(isset($_SESSION["CPF"])){

}else{
    echo'<script>location.href="index.html";</script>';
}
?>
</body>
</html>