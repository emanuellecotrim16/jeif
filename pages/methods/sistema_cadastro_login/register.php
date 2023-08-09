<?php
//Inicia uma nova sessão ou resume uma sessão existente.
session_start();

//Atribui os valores dos campos de formulário enviados pelo método POST a variáveis
$nome = $_POST['nome'];
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$senha = $_POST['password'];
$confirmasenha = $_POST['confirmasenha'];

//Verifica se o e-mail inserido possui um formato válido. Caso contrário, exibe uma mensagem de erro em JavaScript e volta para a página anterior.
if (!$email) {
    echo '<script>alert("O formato do e-mail é inválido"); window.history.back();</script>';
    exit();
}

//Verifica se a senha inserida atende a determinados critérios de segurança, tais como possuir no mínimo 8 caracteres. Caso contrário, exibe uma mensagem de erro em JavaScript e volta para a página anterior.
if (strlen($senha) < 8) {
    echo '<script>alert("A senha deve ter pelo menos 8 caracteres."); window.history.back();</script>';
    exit();
}

//Verifica se a senha e a confirmação de senha são idênticas. Caso contrário, exibe uma mensagem de erro em JavaScript e volta para a página anterior.
if ($senha !== $confirmasenha) {
    echo '<script>alert("As senhas não correspondem"); window.history.back();</script>';
    exit();
}

// inclui o arquivo de conexão com o banco de dados
require_once 'conn.php';

//Realiza uma consulta ao banco de dados para verificar se já existe um professor cadastrado com o mesmo e-mail inseridos.
$query = $conn->prepare("SELECT * FROM professor WHERE email=:email");
$query->execute(['email' => $email]);
$professor = $query->fetch();

//Caso já exista um professor cadastrado com o mesmo e-mail inseridos, exibe uma mensagem de erro em JavaScript e volta para a página anterior.
if ($professor) {
    echo '<script>alert("Este e-mail já está registrado em nosso banco de dados como professor"); window.history.back();</script>';
    exit();
}

//Realiza uma consulta ao banco de dados para verificar se já existe um professor cadastrado com o mesmo nome inseridos.
$query = $conn->prepare("SELECT * FROM professor WHERE nome=:nome");
$query->execute(['nome' => $nome]);
$professor = $query->fetch();

//Caso já exista um professor cadastrado com o mesmo nome inseridos, exibe uma mensagem de erro em JavaScript e volta para a página anterior.
if ($professor) {
    echo '<script>alert("Este nome já está registrado em nosso banco de dados como professor"); window.history.back();</script>';
    exit();
}

//Realiza uma consulta ao banco de dados para verificar se já existe um usuário cadastrado com o mesmo e-mail inseridos.
$query = $conn->prepare("SELECT * FROM usuario WHERE email=:email");
$query->execute(['email' => $email]);
$user = $query->fetch();

//Caso já exista um usuário cadastrado com o mesmo e-mail inseridos, exibe uma mensagem de erro em JavaScript e volta para a página anterior.
if ($user) {
    echo '<script>alert("Este e-mail já está registrado em nosso banco de dados"); window.history.back();</script>';
    exit();
}

//Caso não exista um usuário cadastrado com o mesmo nome ou e-mail inseridos, insere um novo registro na tabela "users" do banco de dados com os dados fornecidos.
$query = $conn->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
$query->execute(['nome' => $nome, 'email' => $email, 'senha' => $senha]);

echo '<script>alert("Registro bem-sucedido"); window.location.href = "../../";</script>';
exit();

?>