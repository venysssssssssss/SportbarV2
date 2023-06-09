<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'assets/php.functions/usuarios.php';
$u = new Usuario;
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportBar</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container-shadow"></div>
    <div class="container">
      <div class="wrap">
        <div class="headings">
          <a id="sign-in" href="#" class="active"><span>Login</span></a>
          <a id="sign-up" href="#"><span>Crie uma conta</span></a>
        </div>
        <div id="sign-in-form">
          <form method="POST" action="AreaPrivada.php">
            <label for="username">Nome</label>
            <input id="username" type="text" name="username" maxlength="30" />
            <label for="password">Senha</label>
            <input id="password" type="password" name="password" maxlength="15" />
            <input id="remember" type="checkbox" />
            <label for="remember" id="rlabel">Mantenha-me conectado</label>
            <input type="submit" class="button" name="submit" value="Entrar" />
          </form>
  
          <footer>
            <div class="hr"></div>
            <div class="fp"><a href="">Esqueceu a senha ?</a></div>
          </footer>
        </div>
        <div id="sign-up-form">
          <form method="POST">
            <label for="username">Nome</label>
            <input type="text" name="username" maxlength="30" />
            <label for="password">Senha</label>
            <input id="password" type="password" name="password" maxlength="15" />
            <label for="password0">Insira a senha novamente</label>
            <input id="password0" type="password" name="password0" />
            <input type="submit" class="button" name="submit" value="Criar a conta" />
          </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="assets/js/login.js"></script>
      </div>
    </div> 
  </body>
</html>


<?php
    if(isset($_POST['username']))
    {
      $nome = addslashes($_POST['username']);
      $senha = addslashes($_POST['password']);
      $confSenha = addslashes($_POST['password0']);
      //verificar se está preenchido
      if(!empty($nome) && !empty($senha) && !empty($confSenha))
      {
          $u->conectar("SportbarLogin","localhost","root","");
          if($u->msgErro == "")
          {
            if($senha == $confSenha)
            {
              if($u->cadastrar($nome,$senha))
              {
                ?>
                <div id="msg-sucesso">
                Cadastrado com sucesso! Acesse para entrar
                </div>
                <?php
              }

              else
              
              {
                ?>
                <div class="msg-erro">
                Usuário já está cadastrado
                </div>
                <?php
              }
            }

            else
            
            {
                ?>
                <div class="msg-erro">
                As senhas não correspondem
                </div>
                <?php
            }
          }
          
          else
          
          {
            ?>
            <div class="msg-erro">
            <?php echo "Erro: ".$u->msgErro;?>
            </div>
            <?php
          }
      }
      
      else
      
      {
        ?>
        <div class="msg-erro">
        Preencha todos os campos!
        </div>
        <?php
      }
    }

?>