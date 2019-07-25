<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/signup_dados.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
require_once('class_search.php');
$insert = new BANCO_DADOS();

    $tabelas =  array(
        'PRODUTO' => 'produto',
        'CADASTROS' => 'cadastros');
//==============================================================

@$opcao = $_POST['opcao'];
if(!$opcao){
    echo '<section class="result_signup">';
    echo '<div class="info_aviso">';
        echo '<i class="fas fa-exclamation-triangle"></i>';
        echo "<h1>Os campos não foram preenchidos.</h1>";
    echo '</div>';
    echo '<div class="btn_voltar">';
        echo '<a href="../interface/signup.php"><i class="fas fa-reply"></i> Tente novamente</a>';
    echo '</div>';
    echo '</section>';
}
//==============================================================

switch ($opcao) {
            case 'empresa':
                $nome_completo = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_STRING);
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $tipo_conta = filter_input(INPUT_POST, 'opcao', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $senha = $_POST['senha'];
                //verificar se os campos foram preenchido
                if($nome_completo == '' || $username == '' || $tipo_conta == '' || $email == '' || $senha == ''){
                    echo '<section class="result_signup">';
                        echo '<div class="info_aviso">';
                            echo '<i class="fas fa-exclamation-triangle"></i>';
                            echo "<h1>Os campos não foram preenchidos.</h1>";
                        echo '</div>';
                        echo '<div class="btn_voltar">';
                            echo '<a href="../interface/signup.php"><i class="fas fa-reply"></i> Tente novamente</a>';
                        echo '</div>';
                    echo '</section>';
                    exit;
                }
                //==============================================================
                $cripty_senha = md5($senha);
                echo '<section class="result_signup">';
                echo '<div class="box_result">';
                    echo '<h1>Nome Completo</h1>';
                    echo '<p>'.$nome_completo.'</p>';
                    echo '</div>';
                echo '<div class="box_result">';
                    echo '<h2>Username:</h2>';
                    echo '<p>'.$username.'</p>';
                echo '</div>';
                echo '<div class="box_result">';
                    echo '<h2>Tipo de Conta:</h2>';
                    echo '<p>'.$tipo_conta.'</p>';
                echo '</div>';
                echo '<div class="box_result">';
                    echo '<h2>E-mail:</h2>';
                    echo '<p>'.$email.'</p>';
                echo '</div>';
                echo '<div class="box_result">';
                    echo '<h2>Sua senha de login</h2>';
                    echo '<p>'.$senha.'</p>';
                echo '</div>';
                echo '<div class="box_info_result">';
                    echo '<span>Sua senha é guardada no banco de dado criptografada</span>';
                    echo '<br>';
                    echo '<span>nenhum de nossos funcionarios terão acesso aos seus dados.</span>';
                echo '</div>';
                echo '<div class="bt_voltar">';
                    echo '<a href="../index.php">voltar</a>';
                echo '</div>';
                echo '</section>';

                //==============================================================
                $insert->insert_DB($tabelas['CADASTROS'], 'id_cadastro', null, $nome_completo, $username, $tipo_conta, $email, $cripty_senha);
                //==============================================================
                break;
            case 'usuario':
            $nome_completo = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_STRING);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $tipo_conta = filter_input(INPUT_POST, 'opcao', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = $_POST['senha'];
            if($nome_completo == '' || $username == '' || $tipo_conta == '' || $email == '' || $senha == ''){
                echo '<section class="result_signup">';
                    echo '<div class="info_aviso">';
                        echo '<i class="fas fa-exclamation-triangle"></i>';
                        echo "<h1>Os campos não foram preenchidos.</h1>";
                    echo '</div>';
                    echo '<div class="btn_voltar">';
                        echo '<a href="../interface/signup.php"><i class="fas fa-reply"></i> Tente novamente</a>';
                    echo '</div>';
                echo '</section>';
                exit;
            }
            //==============================================================
                $cripty_senha = md5($senha);
                echo '<section class="result_signup">';
                echo '<div class="box_result">';
                    echo '<h1>Nome Completo</h1>';
                    echo '<p>'.$nome_completo.'</p>';
                    echo '</div>';
                echo '<div class="box_result">';
                    echo '<h2>Username:</h2>';
                    echo '<p>'.$username.'</p>';
                echo '</div>';
                echo '<div class="box_result">';
                    echo '<h2>Tipo de Conta:</h2>';
                    echo '<p>'.$tipo_conta.'</p>';
                echo '</div>';
                echo '<div class="box_result">';
                    echo '<h2>E-mail:</h2>';
                    echo '<p>'.$email.'</p>';
                echo '</div>';
                echo '<div class="box_result">';
                    echo '<h2>Sua senha de login</h2>';
                    echo '<p>'.$senha.'</p>';
                echo '</div>';
                echo '<div class="box_info_result">';
                    echo '<span>Sua senha é guardada no banco de dado criptografada</span>';
                    echo '<br>';
                    echo '<span>nenhum de nossos funcionarios terão acesso aos seus dados.</span>';
                echo '</div>';
                echo '<div class="bt_voltar">';
                    echo '<a href="../index.php">voltar</a>';
                echo '</div>';
                echo '</section>';

                //==============================================================
                $insert->insert_DB($tabelas['CADASTROS'], 'id_cadastro', null, $nome_completo, $username, $tipo_conta, $email, $cripty_senha);
                break;
}
?>    
</body>
</html>