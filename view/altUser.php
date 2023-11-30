<!--Lembrar que fiz cagada, na teoria o usuário comun não tem acesso a essa página -->
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
    </style>
    <title>Alterar Usuario</title>
</head>
<body>
    <?php 
        include("../model/user.php");
        include("../model/database.php");

        $db = new Database();
        
        $usuario = $db->viewUserAlt($_GET['id']);
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Alterar Usuario
                        <a href="Users.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="../controller/alterar-usuario.php" method="POST">
                        
                                <input type="hidden" name="id" value="<?=$usuario[0]['id']?>" class="form-control">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value="<?=$usuario[0]['Nome']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Sobrenome</label>
                                <input type="text" name="sobrenome" value="<?=$usuario[0]['Sobrenome']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Senha</label>
                                <input type="password" name="senha" value="<?=$usuario[0]['Senha']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>CPF</label>
                                <input type="number" name="CPF" value="<?=$usuario[0]['CPF']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>CNH</label>
                                <input type="number" name="CNH" value="<?=$usuario[0]['CNH']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="number" name="telefone" value="<?=$usuario[0]['Telefone']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Endereço</label>
                                <input type="text" name="endereco" value="<?=$usuario[0]['Endereco']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Carro</label>
                                <input type="text" name="carro" value="<?=$usuario[0]['Carro']?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="alt" class="btn btn-primary">Alterar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php
    session_start();
    if((isset($_SESSION["CPF"]) && $_SESSION['tipo']) || ($_GET['id'] != 1)){

}else{
    echo'<script>location.href="index.html";</script>';
}
?>
</body>
</html>