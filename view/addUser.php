<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../Jquery/jquery-3.7.1.min.js"></script>
    <script src="../Jquery/jquery.maskedinput.min.js"></script>
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
                                <label style="user-select: none;">Nome</label>
                                <input type="text" name="nome" class="form-control" placeholder="Máximo de 110 caracteres." required maxlength="110">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">Sobrenome</label>
                                <input type="text" name="sobrenome" class="form-control" placeholder="Máximo de 36 caracteres." required maxlength="36">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">Senha</label>
                                <input type="text" name="senha" class="form-control" placeholder="Mínimo de 6 caracteres" required minlength="6">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">CPF</label>
                                <input type="text" id="CPF" name="CPF" class="form-control" required placeholder="Ex: 999.999.999-99">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">CNH</label>
                                <input type="number" name="CNH" class="form-control" required placeholder="Ex: 99999999999" max="99999999999">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">Telefone</label>
                                <input type="text" id="telefone" name="telefone" class="form-control" required placeholder="Ex: (19) 9999-9999">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">Endereço</label>
                                <input type="text" name="endereco" class="form-control" required placeholder="Ex: Araras,SP">
                            </div>
                            
                            <div class="mb-3">
                                <label style="user-select: none;">Carro</label>
                                <input type="text" name="carro" class="form-control" required placeholder="Ex: Marca,Modelo,Ano">
                            </div>
                            <div class="mb-3">
                                <label style="user-select: none;">Empresa</label>
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
    if(isset($_SESSION["CPF"])){

}else{
    echo'<script>location.href="index.html";</script>';
}
?>
    <script>
        $("#CPF").mask("999.999.999-99");
        $("#telefone").mask("(99)9999-9999");
    </script>
</body>
</html>