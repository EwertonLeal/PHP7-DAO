<?php

    class Usuario
    {
        private $id;
        private $nome;
        private $email;
        private $senha;

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getSenha()
        {
            return $this->senha;
        }

        public function setSenha($senha)
        {
            $this->senha = $senha;
        }

        public function getById($id)
        {
            $sql = new Sql();

            $results = $sql->select("SELECT * FROM `tb_usuarios` WHERE id = :ID", array(
                ":ID" => $id
            ));

            if(count($results) > 0) {
                $row = $results[0];

                $this->setId($row['id']);
                $this->setNome($row['nome']);
                $this->setEmail($row['email']);
                $this->setSenha($row['senha']);

            }

        }

        public function getByName($nome)
        {
            $sql = new Sql();

            $results = $sql->select("SELECT * FROM `tb_usuarios` WHERE nome = :NOME", array(
                ":NOME" => $nome
            ));

            if(count($results) > 0) {
                $row = $results[0];

                $this->setId($row['id']);
                $this->setNome($row['nome']);
                $this->setEmail($row['email']);
                $this->setSenha($row['senha']);

            }

        }

        public function getByMail($email)
        {
            $sql = new Sql();

            $results = $sql->select("SELECT * FROM `tb_usuarios` WHERE email = :EMAIL", array(
                ":EMAIL" => $email
            ));

            if(count($results) > 0) {
                $row = $results[0];

                $this->setId($row['id']);
                $this->setNome($row['nome']);
                $this->setEmail($row['email']);
                $this->setSenha($row['senha']);

            }

        }

        public function __toString()
        {
            return json_encode(array(
                "id"    => $this->getId(),
                "nome"  => $this->getNome(),
                "email" => $this->getEmail(),
                "senha" => $this->getSenha()
            ));
        }

    }

?>