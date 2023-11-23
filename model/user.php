<?php
    class User{
        public $id;
        private $admin;
        public $name;
        public $sobrenome;
        public $senha;
        public $cpf;
        public $cnh;
        public $telefone;
        public $endereco;
        public $carro;
        
        public function getCarro()
        {
                return $this->carro;
        }

        public function setCarro($carro)
        {
                $this->carro = $carro;

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

        public function getCnh()
        {
                return $this->cnh;
        }

        public function setCnh($cnh)
        {
                $this->cnh = $cnh;

                return $this;
        }

        public function getCpf()
        {
                return $this->cpf;
        }

        public function setCpf($cpf)
        {
                $this->cpf = $cpf;

                return $this;
        }

        public function getSenha()
        {
                return $this->senha;
        }

        public function setSenha($senha)
        {
                $this->senha = $senha;

                return $this;
        }

        public function getSobrenome()
        {
                return $this->sobrenome;
        }

        public function setSobrenome($sobrenome)
        {
                $this->sobrenome = $sobrenome;

                return $this;
        }
        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        public function getAdmin()
        {
                return $this->admin;
        }

        public function setAdmin($admin)
        {
                $this->admin = $admin;

                return $this;
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
    }
?>