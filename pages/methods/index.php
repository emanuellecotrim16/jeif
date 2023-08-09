<?php

session_start();

require_once('methods/sistema_cadastro_login/verification.php');

verification('pages/login.page.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pages/style/index.css">
    <title>Menu</title>
    <link rel="shortcut icon" href="pages/img/avatar-jeif2019-if-baiano.png" type="image/x-icon">
</head>
<body>
    <div class="centro">
        <h1>Bem-vindo!! <span class="permicao"><?php echo $_SESSION['permições']; ?></span></h1>
        <p>Olá, <span class="nome_usuario"><?php echo $_SESSION['nome']; ?></span>. Aproveite o JEIF e assista às transmissões <br> disponíveis!</p>
        <br>
        <a href="./methods/sistema_cadastro_login/logout.php">Sair da conta</a>
    </div>


    
</body>
</html>

