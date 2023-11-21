<?php
    include "conexao-banco.php";

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $cnh = $_POST['cnh'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $carro = $_POST['carro'];
    
    $sql = "INSERT INTO usuario(nome,sobrenome,senha,cpf,cnh,telefone,endereco,carro) values('{$nome}','{$sobrenome}','{$senha}','{$cpf}','{$cnh}','{$telefone}','{$endereco}','{$carro}')";

    $resposta = $conexao->query($sql);
    
?>