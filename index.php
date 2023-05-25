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
                <form method="POST" action="">
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
                <form method="POST" action="cadastrar.php">
                    <label for="username">Nome</label>
                    <input type="text" name="username" maxlength="30" />
                    <label for="password">Senha</label>
                    <input id="password" type="password" name="password" maxlength="15" />
                    <label for="password0">Insiraa a senha novamente</label>
                    <input id="password0" type="password" name="password0" />
                    <input type="submit" class="button" name="submit" value="Criar a conta" />
                </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="assets/js/login.js"></script>
        </div>
    </div>

    <?php
    if(isset($_POST['username']))
    {
        $nome = addslashes($_POST['username']);
        $senha = addslashes($_POST['password']);
        //verificar se está preenchido
        if(!empty($nome) && !empty($senha))
        {
            $u->conectar("SportbarLogin","localhost","root","");
            if($u->msgErro == "")
            {
                if($u->logar($nome,$senha))
                {
                    header("location: AreaPrivada.php");
                    exit; // Importante: encerrar o script após o redirecionamento
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                        Usuário e/ou senha estão incorretos
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro; ?>
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="msg-erro">
                Preencha todos os campos
            </div>
            <?php
        }
    }
    ?>

</body>
</html>
