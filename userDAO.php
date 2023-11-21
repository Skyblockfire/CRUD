<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME','overdrive');

require_once("user.php");

class userDAO{
    private $banco;
    public function __construct(){
        $this->banco = new PDO('mysql:host='.HOST.'; dbname='.DB_NAME,USER,PASSWORD);
    }

    public function cadastrar_usuario($user){
        $admin = $user->getAdmin();
        $nome = $user->getNome();
        $sobrenome = $user->getSobrenome();
        $senha = $user->getSenha();
        $cpf = $user->getCpf();
        $cnh = $user->getCnh();;
        $telefone = $user->getTelefone();
        $endereco = $user->getEndereco();
        $carro = $user->getCarro();


        $Array = array($admin,$nome,$sobrenome,$senha,$cpf,$cnh,$telefone,$endereco,$carro);

        $criar_usuario = $this->banco->prepare('INSERT INTO usuario(admin,nome,sobrenome,senha,cpf,cnh,telefone,endereco,carro) VALUES(?,?,?,?,?,?,?,?,?);');

        $criar_usuario->execute($Array);


    }
}
?>