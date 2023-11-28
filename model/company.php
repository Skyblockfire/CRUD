<?php
    class Empresa{
        public $id;
        public $nome;
        public $nome_fantasia;
        public $cnpj;
        public $endereco;
        public $telefone;
        public $responsavel;
        public function __construct($nome, $nome_fantasia, $cnpj, $endereco, $telefone, $responsavel){
                $this->nome = $nome;
                $this->nome_fantasia = $nome_fantasia;
                $this->cnpj = $cnpj;
                $this->endereco = $endereco;
                $this->telefone = $telefone;
                $this->responsavel = $responsavel;
            }
        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        public function getNomeFantasia()
        {
                return $this->nome_fantasia;
        }

        public function setNomeFantasia($nome_fantasia)
        {
                $this->nome_fantasia = $nome_fantasia;

                return $this;
        }

        public function getCnpj()
        {
                return $this->cnpj;
        }

        public function setCnpj($cnpj)
        {
                $this->cnpj = $cnpj;

                return $this;
        }

        public function getEndereco()
        {
                return $this->endereco;
        }

        public function setEndereco($endereco)
        {
                $this->endereco = $endereco;

                return $this;
        }

        public function getTelefone()
        {
                return $this->telefone;
        }

        public function setTelefone($telefone)
        {
                $this->telefone = $telefone;

                return $this;
        }

        public function getResponsavel()
        {
                return $this->responsavel;
        }

        public function setResponsavel($responsavel)
        {
                $this->responsavel = $responsavel;

                return $this;
        }
    }
?>