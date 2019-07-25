<?php
    require_once('../class/Select_DB.php');
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
            }else{
                require_once('../class/Email.php');
                $email = new Email();
                foreach($resultado as $value){
                    $id_user = $value['idcadastro'];
                    $email_usuario = $value['email'];
                    $senha = $value['senha'];
                }
                $chave = sha1($email_usuario.$senha);
                $email->enviar_Email('Caso seja você que solicitou uma alteração de senha Click em Criar um nova senha<br><br> Caso não foi você entre encontato com central_marketplace@gmail.com', $chave, 'Aviso! recuperação de senha',$email_usuario);
            }

        }

    }

?>