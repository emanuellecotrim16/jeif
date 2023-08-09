<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - JEIF</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="shortcut icon" href="./img/avatar-jeif2019-if-baiano.png" type="image/x-icon">
</head>

<body>
    <div id="cadastro">
        <div id="textLateral">
            <img src="img/guanambi-removebg-preview.png" alt="">
        </div>

        <div id="formulario">


            <form action="../methods/sistema_cadastro_login/login.php" method="post">
 
                <div class="formInputs">
                    <div class="logo">
                        <div class="logo-h1">
                            <h1>Login</h1>
                        </div>
                    </div>
                    <div class="inputs">

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

                    </div>
                    <div class="links">
                        <div class="rotas">
                            <input type="submit" value="Login">
                            <p>ou</p>
                            <a href="register.page.php">Cadastrar</a>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>

</body>

</html>