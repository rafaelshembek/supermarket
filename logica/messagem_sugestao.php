<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../PHPMailer/src/PHPMailer.php');
require('../PHPMailer/src/SMTP.php');
require('../PHPMailer/src/Exception.php');


class Email{
    public function enviar_messagem($msg, $email, $nome_completo){
    try{
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '587';
        $mail->SMTPAuth = true;
        $mail->Username = 'rafaelshembek@gmail.com';
        $mail->Password = 'rafael159357';
        $mail->SMTPSecure = 'tls';
        $mail->CharSet = "UTF-8";

        $mail->setFrom('rafaelshembek@gmail.com', 'Duvidas e Sugestões', true);/* email do [remetente] e [assunto da mensagem]  */
        $mail->addAddress('rafaelshembek@gmail.com'); /* email do [destinatario] */
        $mail->addReplyTo('marketplace_rh@gmail.com', 'Plataforma de vendas Online'); /* email para o usuario responder */
        
        $mail->isHTML(true);
        /* assunto */
        $mail->Subject = 'Messagem de Duvidas E Sugestões';
        //Messagem
        $mail->Body = '<section style="background-color: #fff; padding: 12px;">';
            $mail->Body .= '<h1 style="font-family: Lucida Sans Regular; color: #777">Messagem de Duvidas e Sugestões!</h1>';
            $mail->Body .= '<h4><strong>Nome Completo: </strong>'.$nome_completo.'</h4>';
            $mail->Body .= '<h4><strong>Email: </strong>'.$email.'</h4>';
            $mail->Body .= '<p>'.$msg.'</p>';
        $mail->Body .= '</section>';

        $mail->send();
        echo '<div class="ui positive message">';
            echo '<p class="ui header">Seu email foi enviado com sucesso!</p>';
            echo '<div class=""><a class="ui basic button" href="../">voltar</a></div>';
        echo '</div>';
    }catch(Exception $e){
            echo '<div class="ui negative message">';
                echo '<p class="ui header">Erro ao enviar um email!</p>';
                echo '<div class=""><a class="ui basic button" href="../">voltar</a></div>';
            echo '</div>';
            }
    }
}
?>