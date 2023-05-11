<?php

class Usuario
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        } catch (PDOException $e) {
            $this->msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $senha)
    {
        if ($this->pdo == null) {
            return false; // Falha na conexão com o banco de dados
        }

        // Verificar existência do usuário
        $sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE nome = :n");
        $sql->bindValue(":n", $nome);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return false; // Usuário já cadastrado
        } else {
            // Inserir novo usuário
            $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, senha) VALUES (:n, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true; // Cadastro realizado com sucesso
        }
    }

    public function logar($nome, $senha)
    {
        if ($this->pdo == null) {
            return false; // Falha na conexão com o banco de dados
        }

        // Verificar se o usuário e senha estão cadastrados
        $sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE nome = :n AND senha = :s");
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if ($sql->rowCount() > 0) {
            // Entrar no sistema (sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; // Logado com sucesso
        } else {
            return false;
        }
    }
}
?>
