<?php

Class Usuario
{    
    private $pdo; 
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try
        {

            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);

        }catch (PDOException $e){
            $msgErro = $e->getMessage();
        }
        
    }

    public function cadastrar($nome, $senha)
    {
        global $pdo;
        //verificar existencia email
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE nome = :e");
        $sql->bindValue(":e",$nome);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;
        }
        else
        {
            $sql = $pdo->prepare("INSERT INTO usuarios (nome,senha) VALUES (:n, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        }
    }

    public function logar($nome, $senha)
    {
        global $pdo;
        //verificar se o e-mail e a senha estão cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE nome = :n AND senha = :s");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            //entrar no sistema (sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //logado com sucesso
        }
        else
        {
            return false;
        }
        

    }
}


?>