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
    <title>Alterar Empresa</title>
</head>
<body>
<?php 
        include("../model/user.php");
        include("../model/database.php");

        $db = new Database();
        
        $empresa = $db->viewCompanyAlt($_GET['id_empresa']);
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Alterar Empresa
                        <a href="company.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" action="../controller/alterar-empresa.php" method="POST">

                            <input type="hidden" name="id_empresa" value="<?=$empresa[0]['id_empresa']?>" class="form-control">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value="<?=$empresa[0]['Nome']?>"class="form-control" required placeholder="Máximo de 146 caracteres." maxlength="146">
                            </div>

                            <div class="mb-3">
                                <label>Nome Fantasia</label>
                                <input type="text" name="nome_fantasia" value="<?=$empresa[0]['Nome_Fantasia']?>" class="form-control" required placeholder="Máximo de 55 caracteres." required maxlength="55">
                            </div>

                            <div class="mb-3">
                                <label>CNPJ</label>
                                <input type="text" id="CNPJ" name="CNPJ" value="<?=$empresa[0]['CNPJ']?>" class="form-control" required placeholder="Ex: 99.999.999/9999-99">
                            </div>

                            <div class="mb-3">
                                <label>Endereço</label>
                                <input type="text" name="endereco" value="<?=$empresa[0]['Endereco']?>" class="form-control" required placeholder="Ex: Araras,SP">
                            </div>

                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="text" id="telefone" name="telefone" value="<?=$empresa[0]['Telefone']?>" class="form-control" required placeholder="Ex: (19)9999-9999">
                            </div>
                            
                            <div class="mb-3">
                                <label>Responsável</label>
                                <input type="text" name="responsavel" value="<?=$empresa[0]['Responsavel']?>" class="form-control" required placeholder="Máximo de 146 caracteres." maxlength="146">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="add" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#CNPJ").mask("99.999.999/9999-99");
        $("#telefone").mask("(99)9999-9999");
    </script>
<?php
    session_start();
    if(isset($_SESSION['CPF'])){

}else{
    echo'<script>location.href="index.html";</script>';
}
?>

</body>
</html>