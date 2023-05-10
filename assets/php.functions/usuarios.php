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
            $sql->bindValue(":s",$senha);
            $sql->execute();
            return true;
        }
    }

    public function logar($nome, $senha)
    {
        global $pdo;

    }
}


?>