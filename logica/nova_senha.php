<?php
require_once('../class/Select_DB.php');
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
    
    $senha_1 = filter_input(INPUT_POST, 'password_1', FILTER_SANITIZE_STRING);
    $senha_2 = filter_input(INPUT_POST, 'password_2', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $chave = $_POST['chave'];

    if($email == ''){
        echo '<div class="ui attached grey message">';
        echo '<div class="header">Atenção!</div>';
        echo '<p>Campo de email esta fazio.</p>';
        echo '</div>';
        echo '<div class="ui buttom blue attached message"><a class="ui blue button" href="../interface/altera_nova_senha.php?chave='.$chave.'">fazer login</a></div>';
        exit;
    }else if($senha_1 == '' || $senha_2 == ''){
        echo '<div class="ui attached grey message">';
        echo '<div class="header">Atenção!</div>';
        echo '<p>O campo de senha esta vazio.</p>';
        echo '</div>';
        echo '<div class="ui buttom blue attached message"><a class="ui blue button" href="../interface/altera_nova_senha.php?chave='.$chave.'">fazer login</a></div>';
        exit;
    }else if($senha_1 != $senha_2){
        echo '<div class="ui attached grey message">';
        echo '<div class="header">Atenção!</div>';
        echo '<p>As senhas deve ser iguais.</p>';
        echo '</div>';
        echo '<div class="ui buttom blue attached message"><a class="ui blue button" href="../interface/altera_nova_senha.php?chave='.$chave.'">fazer login</a></div>';
        exit;
    }else{

        $senha_crypt = md5($senha_1);

        $update = new Select_DB();
        $params = array(
            ':senha' => $senha_crypt,
            ':email' => $email
        );
        $update->exe_query("UPDATE cadastro SET senha = :senha WHERE email = :email", $params);
        echo '<section class="ui attached grey message">';
            echo '<div class="header">Aviso!</div>';
            echo 'Senha alterada com sucesso';
        echo '</section>';
        echo '<div class="ui buttom blue attached message"><a class="ui blue button" href="../">fazer login</a></div>';
    }
}
?>