<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
          <form>
            <label for="username">Nome</label>
            <input id="username" type="text" name="username" maxlength="30"/>
            <label for="password">Senha</label>
            <input id="password" type="password" name="password" maxlength="15"/>
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
          <form>
            <label for="username">Nome</label>
            <input type="text" name="username" maxlength="30"/>
            <label for="password">Senha</label>
            <input id="password" type="password" name="password" maxlength="15"/>
            <label for="password0">Insira a senha novamente</label>
            <input id="password0" type="password" name="password0" />
            <input type="submit" class="button" name="submit" value="Criar a conta" />
          </form>
        </div>
      </div>
    </div>
    <?php


    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/login.js"></script>
  </body>
</html>
