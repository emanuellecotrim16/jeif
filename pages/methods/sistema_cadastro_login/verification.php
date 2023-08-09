<?php
// define a função verification que recebe um parâmetro $path
function verification($path){
    // verifica se as variáveis $_SESSION['id_usuario'] e $_SESSION['id_professor'] não existem ou estão vazias
    if(!isset($_SESSION['id_usuario']) && !isset($_SESSION['id_professor'])){
        // redireciona para a página definida na variável $path
        header('Location:'. $path);
        // encerra a execução do script
        exit;
    }
}

?>
