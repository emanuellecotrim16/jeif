<?php
require_once('conn.php');// inclui o arquivo de conexão com o banco de dados

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); // obtém o email informado pelo usuário e valida o formato
$senha = $_POST['password']; // obtém a senha informada pelo usuário

$sql = 'SELECT * FROM usuario WHERE email=:email'; // define a query SQL para buscar um usuário com o email informado
$result = $conn->prepare($sql); // prepara a query SQL para execução
$result->execute(['email' => $email]); // executa a query SQL, passando o email como parâmetro
$user = $result->fetch(); // armazena o resultado da query SQL em um array associativo

if (!empty($user)){ // verifica se há resultados da query SQL
    if ($user['senha'] == $senha){ // verifica se a senha informada pelo usuário é igual à senha armazenada no banco de dados
        session_start(); // inicia uma sessão

        $_SESSION['id_usuario'] = $user['id_usuario']; // armazena o ID_usuario do usuário na sessão
        $_SESSION['nome'] = $user['nome']; // armazena o nome do usuário na sessão
        $_SESSION['email'] = $user['email']; // armazena o email do usuário na sessão
        $_SESSION['permições'] = 'Usuario'; // armazena o status o usuario


        header('location: ../../'); // redireciona o usuário para a página inicial
    }
    else{ // caso a senha esteja incorreta
        echo '<script>alert("A senha está errada!"); window.history.back();</script>'; // exibe uma mensagem de erro e redireciona o usuário de volta para a página de login
        exit(); // finaliza a execução do script
    }
}
else{ // caso não haja resultados da query SQL (o email não existe no banco de dados)
    $sql = 'SELECT * FROM professor WHERE email=:email AND senha=:senha'; // define a query SQL para buscar um professor com o email e senha informados
    $result = $conn->prepare($sql); // prepara a query SQL para execução
    $result->execute(['email' => $email, 'senha' => $senha]); // executa a query SQL, passando o email e senha como parâmetros
    $professor = $result->fetch(); // armazena o resultado da query SQL em um array associativo

    if (!empty($professor)){ // verifica se há resultados da query SQL (o professor existe no banco de dados)
        session_start(); // inicia uma sessão

        $_SESSION['id_professor'] = $professor['id_Professor']; // armazena o ID_professor do professor na sessão
        $_SESSION['nome'] = $professor['nome']; // armazena o nome do professor na sessão
        $_SESSION['email'] = $professor['email']; // armazena o email do professor na sessão
        $_SESSION['permições'] = 'Administrador'; // armazena o status o usuario 

        header('location: ../../'); // redireciona o usuário para a página inicial
    }
    else{ // caso não haja resultados da query SQL (o professor não existe no banco de dados)
        echo '<script>alert("O email está errado!"); window.history.back();</script>'; // exibe uma mensagem de erro e redireciona o usuário de volta para a página de login
        exit(); // finaliza a execução do script
    }
}

?>
