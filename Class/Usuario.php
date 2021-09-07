<?php

    class Usuario
    {
        private $id;
        private $nome;
        private $email;
        private $senha;


        public function __toString():string
        {
            return json_encode(array(
                "id"    => $this->getId(),
                "nome"  => $this->getNome(),
                "email" => $this->getEmail(),
                "senha" => $this->getSenha()
            ));
        }

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

        private function getSenha()
        {
            return $this->senha;
        }

        private function setSenha($senha)
        {
            $this->senha = $senha;
        }

        public function getById($id):void
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
                ":NOME" => "$nome"
            ));

            if(count($results) > 0) {
                $row = $results[0];

                $this->setId($row['id']);
                $this->setNome($row['nome']);
                $this->setEmail($row['email']);
                $this->setSenha($row['senha']);

            } else {
                echo "nenhum registro encontrado";
            }
        
        }

        public function getByMail($email)
        {
            $sql = new Sql();

            $results = $sql->select("SELECT * FROM `tb_usuarios` WHERE email = :EMAIL ORDER BY id", array(
                ":EMAIL" => "$email"
            ));

            if(count($results) > 0) {
                $row = $results[0];

                $this->setId($row['id']);
                $this->setNome($row['nome']);
                $this->setEmail($row['email']);
                $this->setSenha($row['senha']);
            }

        }

        public function getNameList($nome):void
        {
            $sql = new Sql();

            $results = $sql->select("SELECT * FROM `tb_usuarios` WHERE nome LIKE :NOME", array(
                ":NOME" => "%$nome%"
            ));

            if(count($results) > 0 ) {
                foreach($results as $result) {
                    echo json_encode($result)."<br>";
                }
            } else {
                echo "nenhum registro encontrado";
            }

        }

        public static function getMailList($email): void
        {
            $sql = new Sql();

            $results = $sql->select("SELECT * FROM `tb_usuarios` WHERE email LIKE :EMAIL", array(
                ":EMAIL" => "%$email%"
            ));

            if(count($results) > 0 ) {
                foreach($results as $result) {
                    echo json_encode($result)."<br>";
                }
            } else {
                echo "nenhum registro encontrado";
            }

        }

        public static function getList():array
        {
            $sql = new Sql();
            return $result = $sql->select("SELECT * FROM `tb_usuarios`");
        }

        public function criarUsuario($nome, $email, $senha)
        {
            $sql = new Sql();

            $results = $sql->setQuery("INSERT INTO `tb_usuarios`(`id`, `nome`, `email`, `senha`) VALUES ('NULL', :NOME, :EMAIL, :SENHA)", array(
                ":NOME"  => "$nome",
                ":EMAIL" => "$email",
                ":SENHA" => "$senha"
            ));

            echo "Usuário cadastrado com sucesso";

        }

        public function atualizarNome($nomeAntigo, $nomeNovo)
        {
            $sql = new Sql();

            $results = $sql->setQuery("UPDATE `tb_usuarios` SET nome = :NOMENEW WHERE nome = :NOMEOLD", array(
                ":NOMEOLD" => $nomeAntigo,
                ":NOMENEW" => $nomeNovo
            ));

            echo "Nome do usuário $nomeAntigo, alterado para: $nomeNovo";

        }

        public function removerUsuario($id)
        {
            $sql = new Sql();

            $results = $sql->setQuery("DELETE FROM `tb_usuarios` WHERE id = :ID", array(
                ":ID" => $id
            ));

            echo "Usuário ID: $id removido com sucesso!";
        }

    }

?>