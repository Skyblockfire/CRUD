<!--Lembrar que fiz cagada, na teoria o usuário comun não tem acesso a essa página -->
<?php session_start();?>
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
    <title>Alterar Usuario</title>
</head>
<body>
    <?php 
        include("../model/user.php");
        include("../model/database.php");

        $db = new Database();
        
        $usuario = $db->viewUserAlt($_GET['id']);
        $empresa = $db->viewUserCompany();
        ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Alterar Usuario
                        <a href="user.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" action="../controller/alterar-usuario.php" method="POST">
                        
                                <input type="hidden" name="id" value="<?=$usuario[0]['id']?>" class="form-control">

                            <div class="mb-3">
                                <label style="user-select: none;">Nome</label>
                                <input type="text" name="nome" value="<?=$usuario[0]['Nome']?>" class="form-control" required placeholder="Máximo de 110 caracteres." required maxlength="110">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">Sobrenome</label>
                                <input type="text" name="sobrenome" value="<?=$usuario[0]['Sobrenome']?>" class="form-control" required placeholder="Máximo de 36 caracteres." required maxlength="36">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">Senha</label>
                                <input type="text" name="senha" value="<?=$usuario[0]['Senha']?>" class="form-control" required placeholder="Mínimo de 6 caracteres" required minlength="6">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">CPF</label>
                                <input type="text" id="CPF" name="CPF" value="<?=$usuario[0]['CPF']?>" class="form-control" required placeholder="Ex: 999.999.999-99">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">CNH</label>
                                <input type="text" name="CNH" value="<?=$usuario[0]['CNH']?>" class="form-control" required placeholder="Ex: 99999999999">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">Telefone</label>
                                <input type="text" id="telefone" name="telefone" value="<?=$usuario[0]['Telefone']?>" class="form-control" required placeholder="Ex: (19) 9999-9999">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">Endereço</label>
                                <input type="text" name="endereco" value="<?=$usuario[0]['Endereco']?>" class="form-control" required placeholder="Ex: Araras,SP" maxlength="55">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">Carro</label>
                                <input type="text" name="carro" value="<?=$usuario[0]['Carro']?>" class="form-control" required placeholder="Ex: Marca,Modelo,Ano" maxlength="55">
                            </div>

                            <div class="mb-3">
                                <label style="user-select: none;">Empresa</label>
                            <select name="empresa" class="form-control">
                                <?php   
                                    foreach($empresa as $row){
                                        $select = ($usuario['id_empresa'] == $row['id_empresa']) ? 'select' : '';
                                        echo "<option value='{$row['id_empresa']}' $select>{$row['Nome']}</option>";
                                    }
                                ?>
                            </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="alt" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
//Verificação
    if((isset($_SESSION['CPF']) && ($_SESSION['tipo'])) || ($_GET['id'] != 1)){

}else{
    echo'<script>location.href="index.html";</script>';
}?>
    <script>
        $("#CPF").mask("999.999.999-99");
        $("#cnh").mask("99999999999");
        $("#telefone").mask("(99)9999-9999");
    </script>
</body>
</html>