<?php 
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DB_NAME','overdrive');

    require_once("company.php");
    require_once("user.php");
    class Database{
    private $banco;
    public function __construct(){
        $this->banco = new PDO('mysql:host='.HOST.'; dbname='.DB_NAME,USER,PASSWORD);
    }
    public function verificar_login($cpf,$senha){
        $query = $this->banco->prepare('SELECT * FROM usuario WHERE CPF = :cpf AND Senha = :senha');
        //previne o SQLi [Graças a deus]
        $query->bindParam(':cpf', $cpf);
        $query->bindParam(':senha', $senha);
        $query->execute();
        //transforma o que o banco puxou em array
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if($row){
            //verifica se a senha é igual
            if($senha == $row['Senha']){
                $_SESSION['nome'] = $row['Nome'];
                //verifica se é admin
                if($row['admin'] == 1 ){
                    $_SESSION['tipo'] = 1;
                }else{
                    $_SESSION['tipo'] = 0;
                }
                return true;
            }else{
                //Senha incorreta
                return false;
            }
        }
    }

    public function autentica_admin($cpf){
        $query = $this->banco->prepare('SELECT admin FROM usuario WHERE cpf = :cpf');

        $query->bindParam(':cpf', $cpf);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        if($row){
            if($row['admin'] == 1){
                return true;
            }else{
                return false;
            }
        }
    }

    public function cadastrar_empresa($company){
        $nome = $company->getNome();
        $nome_fantasia = $company->getNomeFantasia();
        $cnpj = $company->getCnpj();
        $endereco = $company->getEndereco();
        $telefone = $company->getTelefone();
        $responsavel = $company->getResponsavel();

        $cadastrar_empresa = $this->banco->prepare('INSERT INTO company (nome,nome_fantasia,cnpj,endereco,telefone,responsavel) VALUES (?,?,?,?,?,?)');
        
        $Array = array($nome,$nome_fantasia,$cnpj,$endereco,$telefone,$responsavel);

        $cadastrar_empresa->execute($Array);
    }

    public function alterar_empresa($company){
        $nome = $company->getNome();
        $nome_fantasia = $company->getNomeFantasia();
        $cnpj = $company->getCnpj();
        $endereco = $company->getEndereco();
        $telefone = $company->getTelefone();
        $responsavel = $company->getResponsavel();

        $Array = array($nome,$nome_fantasia,$cnpj,$endereco,$telefone,$responsavel);

        $alterar_empresa = $this->banco->prepare('UPDATE company SET VALUES(?,?,?,?,?,?)');

        $alterar_empresa->execute($Array);
    }

    public function deletar_empresa($cnpj){
        $Array = array($cnpj);

        $deletar_empresa = $this->banco->prepare('DELETE FROM company WHERE cnpj = ?');

        $deletar_empresa -> execute($Array);
    }

public function cadastrar_usuario($user){
    $admin = $user->getAdmin();
    $nome = $user->getNome();
    $sobrenome = $user->getSobrenome();
    $senha = $user->getSenha();
    $cpf = $user->getCpf();
    $cnh = $user->getCnh();
    $telefone = $user->getTelefone();
    $endereco = $user->getEndereco();
    $carro = $user->getCarro();

    $Array = array($admin,$nome,$sobrenome,$senha,$cpf,$cnh,$telefone,$endereco,$carro);

    $criar_usuario = $this->banco->prepare('INSERT INTO usuario(admin,nome,sobrenome,senha,cpf,cnh,telefone,endereco,carro) VALUES(?,?,?,?,?,?,?,?,?);');

    $criar_usuario->execute($Array);
}

public function alterar_usuario($user){
    $admin = $user->getAdmin();
    $nome = $user->getNome();
    $sobrenome = $user->getSobrenome();
    $senha = $user->getSenha();
    $cpf = $user->getCpf();
    $cnh = $user->getCnh();
    $telefone = $user->getTelefone();
    $endereco = $user->getEndereco();
    $carro = $user->getCarro();

    $Array = array($admin,$nome,$sobrenome,$senha,$cpf,$cnh,$telefone,$endereco,$carro);

    $alterar_usuario = $this->banco->prepare('UPDATE usuario(admin,nome,sobrenome,senha,cpf,cnh,telefone,endereco,carro) VALUES(?,?,?,?,?,?,?,?,?);');

    $alterar_usuario->execute($Array);
}

public function deletar_usuario($cpf){
    $Array = array($cpf);

    $deletar_usuario = $this->banco->prepare('DELETE FROM usuario WHERE CPF = ?;');

    $deletar_usuario->execute($Array);
}
}
?>