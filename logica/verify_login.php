<?php 
    session_start();
    require_once('../class/Select_DB.php');
    //obter o nome dos campo
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pass = $_POST['password'];

    
    if($email == '' || $pass == ''){
        echo '<p>ERRO: Os campos não foram preenchido.</p>';
        echo '<a href="../">Tente novamente</a>';
        exit;
    }

    $select = new Select_DB();

    $senha_scrypt = md5($pass);

    $param = array(
        ':email' => $email,
        ':senha' => $senha_scrypt
    );
    // faz a buscar dos dados de login que tem no banco de dado
    $el = $select->exe_query("SELECT * FROM cadastro WHERE email = :email AND senha = :senha", $param);
    foreach($el as $values){
        $_SESSION['id_user'] = $values['idcadastro'];
        // $_SESSION['user'] = $values['username'];
        $_SESSION['username'] = $values['username'];
        $email = $values['email'];
    }

        echo '<p>Login acessando com sucesso</p>';
        echo '<a href="../index.php?username="'.$username.'>voltar</a>';
        header('Location:../?'.$_SESSION['username']);
?>