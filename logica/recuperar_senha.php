<?php
    use RandomPassword\Password;
    
    require_once('../class/Gestor_DB.php');
    require_once('../class/Select_DB.php');
    require_once("../class/Insert_DB.php");
    require_once('../class/Email.php');
    require_once('../class/passwordRandom.php');

?>
<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $error[0] = null;

        if($email == ''){
            exit;
        }else{

            $select = new Select_DB();
            $params = array(
                ':email' => $email
            );

            $resultado = $select->exe_query("SELECT * FROM cadastro WHERE cadastro.email = :email", $params);

            if($resultado == NULL){
                echo $error[0];  
                exit;
            }
            else{
                foreach($resultado as $value){
                    $email_usuario = $value['email'];
                }
                // class para gera uma nova senha com 12 caracter
                $passRandom = new Password();

                $insert = new Insert_DB();

                $pass_scrypt = md5($passRandom->getPassword());
                try {
                    $conn = new Gestor_DB();
                    $ligacao = new PDO('mysql:dbname='.$conn->getBasedado().';host='.$conn->getHost().'', $conn->getUser(), $conn->getPass());

                    $motor = $ligacao->prepare("UPDATE cadastro SET cadastro.senha = ? WHERE cadastro.email = ?");
                    $motor->bindParam(1, $pass_scrypt, PDO::PARAM_STR);
                    $motor->bindParam(2, $email, PDO::PARAM_STR);
                    $motor->execute();
                    $ligacao = null;

                    $mail = new Email();
                    $mail->enviar_Email('Ouver uma Alteração de senha em sua conta de login<br><br> Essa é sua nova senha para o login', $passRandom->getPassword(), 'Aviso! recuperação de senha',$email_usuario);

                } catch (\Throwable $th) {
                    throw $th;
                }
            }
        }

    }

?>