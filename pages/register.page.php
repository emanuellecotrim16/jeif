<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - JEIF</title>
    <link rel="stylesheet" href="style/cadastro.css">
    <link rel="shortcut icon" href="./img/avatar-jeif2019-if-baiano.png" type="image/x-icon">
</head>

<body>
    <div id="cadastro">
        <div id="textLateral">
            <img src="img/guanambi-removebg-preview.png" alt="">
        </div>
        

        <div id="formulario">


            <form action="../methods/sistema_cadastro_login/register.php" method="post">
 
                <div class="formInputs">
                    <div class="logo">
                        <div class="logo-h1">
                            <h1>Cadastre-se</h1>
                        </div>
                    </div>
                    <div class="inputs">
                        <div class="group">
                            <input required name="nome" type="text" class="input">
                            <span class="highlight"></span>
                            <label>Nome</label>
                        </div>
                        <div class="group">
                            <input required name="email" type="text" class="input">
                            <span class="highlight"></span>
                            <label>Email</label>
                        </div>
                        <div class="group">
                            <input required name="password" type="password" class="input">
                            <span class="highlight"></span>
                            <label>Senha</label>
                        </div>
                        <div class="group">
                            <input required name="confirmasenha" type="password" class="input">
                            <span class="highlight"></span>
                            <label>Confirme a senha</label>
                        </div>
                    </div>
                    <div class="links">
                        <div class="rotas">
                            <input type="submit" value="Cadastrar">
                            <p>ou</p>
                            <a href="login.page.php">Login</a>
                        </div>
                    </div>
                </div>


            </form>


        </div>
    </div>

</body>

</html>