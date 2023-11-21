<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();

        if(empty($_POST) or (empty($_POST["usuario"]) or (empty($_POST["senha"]))))
         {
            print'<script>location.href=index.html';
         }
        include ("banco.php");

         $usuario = $_POST["usuario"];
         $senha = $_POST["senha"];

         $sql = "SELECT * FROM usuarios
         WHERE usuario = '{$usuario}'
         AND senha = '{$senha}'";

         $resposta = $conexao->query($sql);
         $row = $resposta->fetch_object();
         $quantidade = $resposta->num_rows;

         if($quantidade > 0){
            $_SESSION["usuario"] = $usuario;
            $_SESSION["nome"] = $row->nome;
         }else{
            print"<script>alert('Usuario e/ou senha incorretos')</script>";
            print"<script>location.href=index.html";
         }
    ?>
</body>
</html>