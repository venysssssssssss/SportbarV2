<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Acessível</title>
    <style>
        /* Estilos CSS adicionados apenas para fins de demonstração */
        body {
            text-align: center;
            font-size: 24px;
            padding-top: 100px;
        }
    </style>
</head>

<body>
    <h1>Página Acessível</h1>
    <p>SEJA BEM-VINDO</p>
    <p>Você está logado e pode acessar o conteúdo desta página.</p>
</body>

</html>
