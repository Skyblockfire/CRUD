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

    public function viewCompany($tipoBusca){
        if(isset($_POST['search'])){
            $busca = '%' . $_POST['search'] .'%';
            $query = $this->banco->prepare('SELECT id_empresa,Nome,Nome_Fantasia,CNPJ,Endereco,Telefone,Responsavel FROM empresa WHERE nome = :busca or id_empresa = :busca or telefone = :busca or endereco = :busca');
    
            $query->bindParam(':busca', $busca,PDO::PARAM_STR);
    
            $query->execute();
            
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }else{
                $query = $this->banco->prepare('SELECT id_empresa,Nome,Nome_Fantasia,CNPJ,Endereco,Telefone,Responsavel FROM empresa');
    
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    public function viewCompanyAlt($id){
        $query = $this->banco->prepare('SELECT id_empresa,Nome,Nome_Fantasia,CNPJ,Endereco,Telefone,Responsavel FROM empresa WHERE id_empresa = :id');

        $query->bindParam(':id', $id);
        $query->execute();
    
        return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }
    public function cadastrar_empresa($company){
        $nome = $company->getNome();
        $nome_fantasia = $company->getNomeFantasia();
        $cnpj = $company->getCnpj();
        $endereco = $company->getEndereco();
        $telefone = $company->getTelefone();
        $responsavel = $company->getResponsavel();

        $cadastrar_empresa = $this->banco->prepare('INSERT INTO empresa (nome,nome_fantasia,cnpj,endereco,telefone,responsavel) VALUES (?,?,?,?,?,?)');
        
        $Array = array($nome,$nome_fantasia,$cnpj,$endereco,$telefone,$responsavel);

        $cadastrar_empresa->execute($Array);
    }

    public function alterar_empresa($company,$id){
        $nome = $company->getNome();
        $nome_fantasia = $company->getNomeFantasia();
        $cnpj = $company->getCnpj();
        $endereco = $company->getEndereco();
        $telefone = $company->getTelefone();
        $responsavel = $company->getResponsavel();

        $Array = array($nome,$nome_fantasia,$cnpj,$endereco,$telefone,$responsavel,$id);

        $alterar_empresa = $this->banco->prepare('UPDATE empresa SET Nome = ?, Nome_Fantasia = ?, CNPJ = ?, Endereco = ?, Telefone = ?, Responsavel = ? where id_empresa = ?');

        $alterar_empresa->execute($Array);

    }

    public function deletar_empresa($id){
        $deletar_empresa = $this->banco->prepare('DELETE FROM empresa WHERE id_empresa = :id');

        $deletar_empresa->bindParam(':id', $id);

        $deletar_empresa -> execute();
    }
public function viewUser($tipoBusca){
    if(isset($_POST['search'])){
        $busca = '%' . $_POST['search'] .'%';
        $query = $this->banco->prepare('SELECT id,Nome,Sobrenome,CPF,CNH,Telefone,Endereco,Carro FROM usuario WHERE nome = :busca or id = :busca AND id <> 1 or telefone = :busca or endereco = :busca');

        $query->bindParam(':busca', $busca,PDO::PARAM_STR);

        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }else{
            $query = $this->banco->prepare('SELECT id,concat(Nome," ",Sobrenome) Nome,CPF,CNH,Telefone,Endereco,Carro FROM usuario WHERE id <> 1');

            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
public function viewUserAlt($id){
    $query = $this->banco->prepare('SELECT id,Nome,Sobrenome,Senha,CPF,CNH,Telefone,Endereco,Carro FROM usuario WHERE id <> 1 and id = :id');

    $query->bindParam(':id', $id);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
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

public function alterar_usuario($user,$id){
    $admin = $user->getAdmin();
    $nome = $user->getNome();
    $sobrenome = $user->getSobrenome();
    $senha = $user->getSenha();
    $cpf = $user->getCpf();
    $cnh = $user->getCnh();
    $telefone = $user->getTelefone();
    $endereco = $user->getEndereco();
    $carro = $user->getCarro();

    $Array = array($admin,$nome,$sobrenome,$senha,$cpf,$cnh,$telefone,$endereco,$carro,$id);

    $alterar_usuario = $this->banco->prepare('UPDATE usuario SET admin = ?, Nome = ?, Sobrenome = ?, Senha = ?, CPF = ?, CNH = ?, Telefone = ?, Endereco = ?, Carro = ? WHERE id = ?;');

    $alterar_usuario->execute($Array);
}

public function deletar_usuario($id){
    $Array = array($id);

    $deletar_usuario = $this->banco->prepare('DELETE FROM usuario WHERE id = ?;');

    $deletar_usuario->execute($Array);

    return true;
}
}
?>