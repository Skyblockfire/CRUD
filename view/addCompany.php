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
    <title>Adicionar Empresa</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Empresa
                        <a href="company.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" action="../controller/adicionar-empresa.php" method="POST">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control" required placeholder="Máximo de 146 caracteres." maxlength="146">
                            </div>

                            <div class="mb-3">
                                <label>Nome Fantasia</label>
                                <input type="text" name="nome_fantasia" class="form-control" placeholder="Máximo de 55 caracteres." required maxlength="55">
                            </div>

                            <div class="mb-3">
                                <label>CNPJ</label>
                                <input type="text" name="CNPJ" class="form-control" id="CNPJ" required placeholder="Ex: 99.999.999/9999-99">
                            </div>

                            <div class="mb-3">
                                <label>Endereço</label>
                                <input type="text" name="endereco" class="form-control" required placeholder="Ex: Araras,SP">
                            </div>

                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="text" id="telefone" name="telefone" class="form-control" required placeholder="Ex: (19)9999-9999">
                            </div>
                            
                            <div class="mb-3">
                                <label>Responsável</label>
                                <input type="text" name="responsavel" class="form-control" required placeholder="Máximo de 146 caracteres." maxlength="146">
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
    <script>
        $("#CNPJ").mask("99.999.999/9999-99");
        $("#telefone").mask("(99)9999-9999");
    </script>
<?php
    session_start();
    if(isset($_SESSION["CPF"])){

}else{
    echo'<script>location.href="index.html";</script>';
}
?>
</body>
</html>