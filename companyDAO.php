<?php 
    require_once("company.php");

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DB_NAME','overdrive');

    class companyDAO{
    private $banco;
    public function __construct(){
        $this->banco = new PDO('mysql:host='.HOST.'; dbname='.DB_NAME,USER,PASSWORD);
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
}
?>